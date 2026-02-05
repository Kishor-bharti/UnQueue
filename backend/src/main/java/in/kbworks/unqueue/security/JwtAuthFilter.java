package in.kbworks.unqueue.security;

import in.kbworks.unqueue.entity.User;
import in.kbworks.unqueue.repository.UserRepository;
import jakarta.servlet.FilterChain;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Component;
import org.springframework.web.filter.OncePerRequestFilter;

import java.io.IOException;
import java.util.List;

@Component
public class JwtAuthFilter extends OncePerRequestFilter {

    private final JwtService jwtService;
    private final UserRepository userRepository;

    public JwtAuthFilter(JwtService jwtService, UserRepository userRepository) {
        this.jwtService = jwtService;
        this.userRepository = userRepository;
    }

    @Override
    protected void doFilterInternal(
            HttpServletRequest request,
            HttpServletResponse response,
            FilterChain filterChain
    ) throws ServletException, IOException {

        String auth = request.getHeader("Authorization");

        if (auth != null && auth.startsWith("Bearer ")) {
            String token = auth.substring(7);

            try {
                Long userId = jwtService.validateAndGetUserId(token, "access");
                User user = userRepository.findById(userId).orElse(null);

                if (user != null) {
                    var authToken = new UsernamePasswordAuthenticationToken(
                            user, null, List.of()
                    );
                    SecurityContextHolder.getContext().setAuthentication(authToken);
                }
            } catch (Exception ignored) {
                // invalid token -> skip
            }
        }

        filterChain.doFilter(request, response);
    }
}