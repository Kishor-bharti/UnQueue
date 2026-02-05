package in.kbworks.unqueue.service;

import in.kbworks.unqueue.dto.BookingCreateRequest;
import in.kbworks.unqueue.entity.Booking;
import in.kbworks.unqueue.entity.User;
import in.kbworks.unqueue.repository.BookingRepository;
import org.springframework.stereotype.Service;

import java.time.Instant;
import java.util.List;

@Service
public class BookingService {

    private final BookingRepository bookingRepository;

    public BookingService(BookingRepository bookingRepository) {
        this.bookingRepository = bookingRepository;
    }

    public Booking create(User user, BookingCreateRequest req) {

        Booking booking = Booking.builder()
                .user(user)
                .organisationName(req.getOrganisationName())
                .tokenNo(req.getTokenNo())
                .status("SUCCESSFUL")
                .createdAt(Instant.now())
                .build();

        return bookingRepository.save(booking);
    }

    public List<Booking> list(User user) {
        return bookingRepository.findByUserOrderByCreatedAtDesc(user);
    }

    public Booking cancel(User user, Long bookingId) {
        Booking b = bookingRepository.findById(bookingId)
                .orElseThrow(() -> new RuntimeException("Booking not found"));

        if (!b.getUser().getId().equals(user.getId())) {
            throw new RuntimeException("Forbidden");
        }

        b.setStatus("CANCELLED");
        return bookingRepository.save(b);
    }
}
