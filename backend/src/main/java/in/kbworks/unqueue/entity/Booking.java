package in.kbworks.unqueue.entity;

import jakarta.persistence.*;
import lombok.*;

import java.time.Instant;

@Getter @Setter
@NoArgsConstructor @AllArgsConstructor
@Builder
@Entity
@Table(name = "bookings")
public class Booking {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @ManyToOne(optional = false, fetch = FetchType.LAZY)
    @JoinColumn(name="user_id")
    private User user;

    @Column(name="organisation_name", nullable = false, length = 160)
    private String organisationName;

    @Column(name="token_no", nullable = false)
    private Integer tokenNo;

    @Column(nullable = false, length = 20)
    private String status; // SUCCESSFUL, CANCELLED

    @Column(name="created_at", nullable = false)
    private Instant createdAt;
}
