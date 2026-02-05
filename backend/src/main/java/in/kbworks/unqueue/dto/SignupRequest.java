package in.kbworks.unqueue.dto;

import jakarta.validation.constraints.*;
import lombok.Data;

@Data
public class SignupRequest {

    @NotBlank
    @Size(min = 2, max = 120)
    private String fullName;

    @NotBlank
    @Email
    private String email;

    @Min(1)
    @Max(120)
    private Integer age;

    @Size(max = 20)
    private String gender;

    @NotBlank
    @Size(min = 6, max = 72)
    private String password;
}
