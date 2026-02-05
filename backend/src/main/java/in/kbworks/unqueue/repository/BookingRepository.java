package in.kbworks.unqueue.repository;

import in.kbworks.unqueue.entity.Booking;
import in.kbworks.unqueue.entity.User;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface BookingRepository extends JpaRepository<Booking, Long> {
    List<Booking> findByUserOrderByCreatedAtDesc(User user);
}
