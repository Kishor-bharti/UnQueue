package in.kbworks.unqueue.exception;

import lombok.*;

import java.time.Instant;

@Getter @Setter
@NoArgsConstructor @AllArgsConstructor
@Builder
public class ApiError {
    private String message;
    private Instant timestamp;
}
