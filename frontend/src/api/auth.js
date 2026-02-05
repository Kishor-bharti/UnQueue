import { api } from "./axios";

export const authApi = {
  signup(payload) {
    return api.post("/api/auth/signup", payload);
  },
  login(payload) {
    return api.post("/api/auth/login", payload);
  },
  me() {
    return api.get("/api/auth/me");
  },
  logout(refreshToken) {
    return api.post("/api/auth/logout", { refreshToken });
  },
};
