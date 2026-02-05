create table users (
  id bigserial primary key,
  full_name varchar(120) not null,
  email varchar(180) not null unique,
  age int,
  gender varchar(20),
  password_hash varchar(255) not null,
  created_at timestamptz not null default now()
);

create table bookings (
  id bigserial primary key,
  user_id bigint not null references users(id) on delete cascade,
  organisation_name varchar(160) not null,
  token_no int not null,
  status varchar(20) not null,
  created_at timestamptz not null default now()
);

create index idx_bookings_user_created_at on bookings(user_id, created_at desc);

create table refresh_tokens (
  id bigserial primary key,
  user_id bigint not null references users(id) on delete cascade,
  token_hash varchar(255) not null,
  expires_at timestamptz not null,
  revoked boolean not null default false,
  created_at timestamptz not null default now()
);

create index idx_refresh_tokens_user on refresh_tokens(user_id);
create index idx_refresh_tokens_hash on refresh_tokens(token_hash);