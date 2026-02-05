package in.kbworks.unqueue.controller;

import in.kbworks.unqueue.dto.BookingCreateRequest;
import in.kbworks.unqueue.dto.BookingResponse;
import in.kbworks.unqueue.entity.Booking;
import in.kbworks.unqueue.entity.User;
import in.kbworks.unqueue.service.BookingService;
import jakarta.validation.Valid;
import org.springframework.http.ResponseEntity;
import org.springframework.security.core.Authentication;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Map;

@RestController
@RequestMapping("/api/bookings")
@CrossOrigin(origins = "*")
public class BookingController {

    private final BookingService bookingService;

    public BookingController(BookingService bookingService) {
        this.bookingService = bookingService;
    }

    @PostMapping
    public ResponseEntity<?> create(Authentication auth, @Valid @RequestBody BookingCreateRequest req) {
        User user = (User) auth.getPrincipal();
        Booking b = bookingService.create(user, req);

        return ResponseEntity.ok(Map.of(
                "id", b.getId(),
                "organisationName", b.getOrganisationName(),
                "tokenNo", b.getTokenNo(),
                "status", b.getStatus(),
                "createdAt", b.getCreatedAt()
        ));
    }

    @GetMapping
    public ResponseEntity<List<BookingResponse>> list(Authentication auth) {
        User user = (User) auth.getPrincipal();

        List<BookingResponse> data = bookingService.list(user).stream()
                .map(b -> BookingResponse.builder()
                        .id(b.getId())
                        .organisationName(b.getOrganisationName())
                        .tokenNo(b.getTokenNo())
                        .status(b.getStatus())
                        .createdAt(b.getCreatedAt())
                        .build())
                .toList();

        return ResponseEntity.ok(data);
    }

    @PatchMapping("/{id}/cancel")
    public ResponseEntity<?> cancel(Authentication auth, @PathVariable Long id) {
        User user = (User) auth.getPrincipal();
        Booking b = bookingService.cancel(user, id);

        return ResponseEntity.ok(Map.of(
                "id", b.getId(),
                "status", b.getStatus()
        ));
    }
}