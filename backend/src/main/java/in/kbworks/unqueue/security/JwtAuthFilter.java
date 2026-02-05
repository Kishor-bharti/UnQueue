package in.kbworks.unqueue.security;

import in.kbworks.unqueue.entity.User;
import in.kbworks.unqueue.repository.UserRepository;
import jakarta.servlet.*;
import jakarta.servlet.http.*;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Component;

import java.io.IOException;
import java.util.List;

@Component
public class JwtAuthFilter extends GenericFilter {

    private final JwtService jwtService;
    private final UserRepository userRepository;

    public JwtAuthFilter(JwtService jwtService, UserRepository userRepository) {
        this.jwtService = jwtService;
        this.userRepository = userRepository;
    }

    @Override
    public void doFilter(ServletRequest req, ServletResponse res, FilterChain chain)
            throws IOException, ServletException {

        HttpServletRequest request = (HttpServletRequest) req;

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
                // invalid token -> no auth
            }
        }

        chain.doFilter(req, res);
    }
}
