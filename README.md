### This is a New Version of the unqueue-legacy-php-version-2024!

## Check branch 👉 : unqueue-legacy-php-version-2024 for older version!

## Working on the new version 2026!

```txt
unqueue-backend/
│
├── pom.xml
├── mvnw
├── mvnw.cmd
├── .mvn/
│   └── wrapper/
│       ├── maven-wrapper.properties
│       └── maven-wrapper.jar
│
├── src/
│   ├── main/
│   │   ├── java/
│   │   │   └── in/
│   │   │       └── kbworks/
│   │   │           └── unqueue/
│   │   │               ├── UnqueueApplication.java
│   │   │               │
│   │   │               ├── controller/
│   │   │               │   ├── AuthController.java
│   │   │               │   └── BookingController.java
│   │   │               │
│   │   │               ├── dto/
│   │   │               │   ├── AuthResponse.java
│   │   │               │   ├── BookingCreateRequest.java
│   │   │               │   ├── LoginRequest.java
│   │   │               │   └── SignupRequest.java
│   │   │               │
│   │   │               ├── entity/
│   │   │               │   ├── Booking.java
│   │   │               │   ├── RefreshToken.java
│   │   │               │   └── User.java
│   │   │               │
│   │   │               ├── repository/
│   │   │               │   ├── BookingRepository.java
│   │   │               │   ├── RefreshTokenRepository.java
│   │   │               │   └── UserRepository.java
│   │   │               │
│   │   │               ├── security/
│   │   │               │   ├── JwtAuthFilter.java
│   │   │               │   ├── JwtService.java
│   │   │               │   └── SecurityConfig.java
│   │   │               │
│   │   │               ├── service/
│   │   │               │   ├── AuthService.java
│   │   │               │   └── BookingService.java
│   │   │               │
│   │   │               └── exception/
│   │   │                   ├── ApiError.java
│   │   │                   └── GlobalExceptionHandler.java
│   │   │
│   │   └── resources/
│   │       └── application.yml
│   │
│   └── test/
│       └── java/
│           └── in/kbworks/unqueue/
│               └── UnqueueApplicationTests.java
│
└── README.md
```