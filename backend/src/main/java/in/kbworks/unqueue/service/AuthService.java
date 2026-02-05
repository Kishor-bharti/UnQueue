package in.kbworks.unqueue.service;

import in.kbworks.unqueue.dto.*;
import in.kbworks.unqueue.entity.RefreshToken;
import in.kbworks.unqueue.entity.User;
import in.kbworks.unqueue.repository.RefreshTokenRepository;
import in.kbworks.unqueue.repository.UserRepository;
import in.kbworks.unqueue.security.JwtService;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;

import java.nio.charset.StandardCharsets;
import java.security.MessageDigest;
import java.time.Instant;

@Service
public class AuthService {

    private final UserRepository userRepository;
    private final RefreshTokenRepository refreshTokenRepository;
    private final JwtService jwtService;
    private final BCryptPasswordEncoder encoder = new BCryptPasswordEncoder();

    @Value("${app.jwt.access-token-minutes}")
    private int accessMinutes;

    @Value("${app.jwt.refresh-token-days}")
    private int refreshDays;

    public AuthService(UserRepository userRepository,
                       RefreshTokenRepository refreshTokenRepository,
                       JwtService jwtService) {
        this.userRepository = userRepository;
        this.refreshTokenRepository = refreshTokenRepository;
        this.jwtService = jwtService;
    }

    public void signup(SignupRequest req) {
        if (userRepository.existsByEmail(req.getEmail())) {
            throw new RuntimeException("Email already exists");
        }

        User user = User.builder()
                .fullName(req.getFullName())
                .email(req.getEmail().toLowerCase())
                .age(req.getAge())
                .gender(req.getGender())
                .passwordHash(encoder.encode(req.getPassword()))
                .createdAt(Instant.now())
                .build();

        userRepository.save(user);
    }

    public AuthResponse login(LoginRequest req) {
        User user = userRepository.findByEmail(req.getEmail().toLowerCase())
                .orElseThrow(() -> new RuntimeException("Invalid credentials"));

        if (!encoder.matches(req.getPassword(), user.getPasswordHash())) {
            throw new RuntimeException("Invalid credentials");
        }

        String access = jwtService.generateAccessToken(user.getId(), accessMinutes);
        String refresh = jwtService.generateRefreshToken(user.getId(), refreshDays);

        // store refresh token in DB (hashed)
        RefreshToken rt = RefreshToken.builder()
                .user(user)
                .tokenHash(sha256(refresh))
                .expiresAt(Instant.now().plusSeconds(refreshDays * 86400L))
                .revoked(false)
                .createdAt(Instant.now())
                .build();

        refreshTokenRepository.save(rt);

        return AuthResponse.builder()
                .accessToken(access)
                .refreshToken(refresh)
                .build();
    }

    public AuthResponse refresh(String refreshToken) {
        Long userId = jwtService.validateAndGetUserId(refreshToken, "refresh");

        var stored = refreshTokenRepository.findByTokenHash(sha256(refreshToken))
                .orElseThrow(() -> new RuntimeException("Refresh token not found"));

        if (stored.isRevoked()) {
            throw new RuntimeException("Refresh token revoked");
        }
        if (stored.getExpiresAt().isBefore(Instant.now())) {
            throw new RuntimeException("Refresh token expired");
        }

        // rotate refresh token (recommended)
        stored.setRevoked(true);
        refreshTokenRepository.save(stored);

        User user = userRepository.findById(userId)
                .orElseThrow(() -> new RuntimeException("User not found"));

        String newAccess = jwtService.generateAccessToken(user.getId(), accessMinutes);
        String newRefresh = jwtService.generateRefreshToken(user.getId(), refreshDays);

        RefreshToken newRt = RefreshToken.builder()
                .user(user)
                .tokenHash(sha256(newRefresh))
                .expiresAt(Instant.now().plusSeconds(refreshDays * 86400L))
                .revoked(false)
                .createdAt(Instant.now())
                .build();

        refreshTokenRepository.save(newRt);

        return AuthResponse.builder()
                .accessToken(newAccess)
                .refreshToken(newRefresh)
                .build();
    }

    public void logout(String refreshToken) {
        var stored = refreshTokenRepository.findByTokenHash(sha256(refreshToken))
                .orElseThrow(() -> new RuntimeException("Refresh token not found"));

        stored.setRevoked(true);
        refreshTokenRepository.save(stored);
    }

    private String sha256(String input) {
        try {
            MessageDigest digest = MessageDigest.getInstance("SHA-256");
            byte[] hash = digest.digest(input.getBytes(StandardCharsets.UTF_8));
            StringBuilder sb = new StringBuilder();
            for (byte b : hash) sb.append(String.format("%02x", b));
            return sb.toString();
        } catch (Exception e) {
            throw new RuntimeException("Hash error");
        }
    }
}
