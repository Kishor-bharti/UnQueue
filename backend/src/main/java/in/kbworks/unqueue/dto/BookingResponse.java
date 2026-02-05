package in.kbworks.unqueue.dto;

import lombok.*;

import java.time.Instant;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@Builder
public class BookingResponse {
    private Long id;
    private String organisationName;
    private Integer tokenNo;
    private String status;
    private Instant createdAt;
}
