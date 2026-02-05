package in.kbworks.unqueue.entity;

import jakarta.persistence.*;
import lombok.*;

import java.time.Instant;

@Getter @Setter
@NoArgsConstructor @AllArgsConstructor
@Builder
@Entity
@Table(name = "users")
public class User {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name="full_name", nullable = false, length = 120)
    private String fullName;

    @Column(nullable = false, unique = true, length = 180)
    private String email;

    private Integer age;

    @Column(length = 20)
    private String gender;

    @Column(name="password_hash", nullable = false)
    private String passwordHash;

    @Column(name="created_at", nullable = false)
    private Instant createdAt;
}