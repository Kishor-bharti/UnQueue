package in.kbworks.unqueue.security;

import io.jsonwebtoken.Jwts;
import io.jsonwebtoken.security.Keys;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import javax.crypto.SecretKey;
import java.time.Instant;
import java.util.Date;

@Service
public class JwtService {

    private final SecretKey key;

    @Value("${app.jwt.issuer}")
    private String issuer;

    public JwtService(@Value("${app.jwt.secret}") String secret) {
        this.key = Keys.hmacShaKeyFor(secret.getBytes());
    }

    public String generateAccessToken(Long userId, int minutes) {
        Instant now = Instant.now();
        Instant exp = now.plusSeconds(minutes * 60L);

        return Jwts.builder()
                .issuer(issuer)
                .subject(String.valueOf(userId))
                .issuedAt(Date.from(now))
                .expiration(Date.from(exp))
                .claim("type", "access")
                .signWith(key)
                .compact();
    }

    public String generateRefreshToken(Long userId, int days) {
        Instant now = Instant.now();
        Instant exp = now.plusSeconds(days * 86400L);

        return Jwts.builder()
                .issuer(issuer)
                .subject(String.valueOf(userId))
                .issuedAt(Date.from(now))
                .expiration(Date.from(exp))
                .claim("type", "refresh")
                .signWith(key)
                .compact();
    }

    public Long validateAndGetUserId(String token, String expectedType) {
        var claims = Jwts.parser()
                .verifyWith(key)
                .build()
                .parseSignedClaims(token)
                .getPayload();

        String type = claims.get("type", String.class);
        if (!expectedType.equals(type)) {
            throw new RuntimeException("Invalid token type");
        }

        return Long.parseLong(claims.getSubject());
    }
}
