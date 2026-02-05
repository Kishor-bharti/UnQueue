# UnQueue Migration Plan (React + Spring Boot + Postgres)

## Goal
Migrate legacy PHP + MySQL project into a modern stack:
- **Frontend:** React
- **Backend:** Java Spring Boot (REST)
- **Database:** PostgreSQL
- **Auth:** JWT (access token) + optional refresh token

---

## Current Legacy Summary (from ZIP)
### Existing DB
- `users`
  - `id`, `fullname`, `email`, `age`, `gender`, `password`

### Existing behavior
- Signup inserts into `users` and then **creates a new table per user**: `user_{id}`
- Each `user_{id}` table stores:
  - `organisation_name`, `token_no`, `status`, `timestamp`

### Major problem
Creating tables dynamically per user is **not scalable** and not suitable for Postgres + Spring Boot.

---

## New Data Model (Postgres)
### 1) users
- `id` (bigserial, PK)
- `full_name` (varchar)
- `email` (varchar, unique)
- `age` (int)
- `gender` (varchar)
- `password_hash` (varchar)
- `created_at` (timestamptz)

### 2) bookings (tokens)
- `id` (bigserial, PK)
- `user_id` (bigint, FK → users.id)
- `organisation_name` (varchar)
- `token_no` (int)
- `status` (varchar)  // SUCCESSFUL | CANCELLED
- `created_at` (timestamptz)

**Indexes**
- `users(email)` unique
- `bookings(user_id, created_at)`

---

## Backend (Spring Boot) Architecture
### Packages
- `controller`
- `service`
- `repository`
- `entity`
- `dto`
- `security`
- `exception`

### APIs
#### Auth
- `POST /api/auth/signup`
- `POST /api/auth/login`
- `GET /api/auth/me`

#### Bookings
- `POST /api/bookings` (create token)
- `GET /api/bookings` (list current user tokens)
- `GET /api/bookings/history` (history)
- `PATCH /api/bookings/{id}/cancel`

---

## Frontend (React) Plan
### Pages
- `/signup`
- `/login`
- `/dashboard`
- `/history`

### State
- store JWT in localStorage
- axios interceptor adds Authorization header

---

## Deployment (Recommended)
- **Frontend:** Vercel
- **Backend:** Render
- **Database:** Supabase Postgres (or Neon)

---

## Next Deliverable (what we build first)
1) Spring Boot project skeleton
2) Postgres schema
3) JWT auth (signup/login/me)
4) Booking CRUD APIs

Once backend is ready, we build the React UI.

