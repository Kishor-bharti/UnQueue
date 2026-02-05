import { api } from "./axios";

export const bookingsApi = {
  create(payload) {
    return api.post("/api/bookings", payload);
  },
  list() {
    return api.get("/api/bookings");
  },
  cancel(id) {
    return api.patch(`/api/bookings/${id}/cancel`);
  },
};
