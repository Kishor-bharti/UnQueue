package in.kbworks.unqueue.dto;

import jakarta.validation.constraints.*;
import lombok.Data;

@Data
public class BookingCreateRequest {

    @NotBlank
    @Size(min = 2, max = 160)
    private String organisationName;

    @NotNull
    @Min(1)
    @Max(999999)
    private Integer tokenNo;
}
