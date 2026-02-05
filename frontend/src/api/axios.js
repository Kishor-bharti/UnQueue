import axios from "axios";
import { tokenStorage } from "../utils/tokenStorage";

export const api = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL,
});

let isRefreshing = false;
let pendingQueue = [];

function resolveQueue(error, token = null) {
  pendingQueue.forEach((prom) => {
    if (error) prom.reject(error);
    else prom.resolve(token);
  });
  pendingQueue = [];
}

api.interceptors.request.use((config) => {
  const access = tokenStorage.getAccess();
  if (access) {
    config.headers.Authorization = `Bearer ${access}`;
  }
  return config;
});

// Auto refresh on 401
api.interceptors.response.use(
  (res) => res,
  async (error) => {
    const original = error.config;

    if (error.response?.status === 401 && !original._retry) {
      original._retry = true;

      if (isRefreshing) {
        return new Promise((resolve, reject) => {
          pendingQueue.push({ resolve, reject });
        }).then((token) => {
          original.headers.Authorization = `Bearer ${token}`;
          return api(original);
        });
      }

      isRefreshing = true;

      try {
        const refreshToken = tokenStorage.getRefresh();
        if (!refreshToken) throw new Error("No refresh token");

        const resp = await axios.post(
          `${import.meta.env.VITE_API_BASE_URL}/api/auth/refresh`,
          { refreshToken }
        );


        const { accessToken, refreshToken: newRefresh } = resp.data;
        tokenStorage.setTokens({ accessToken, refreshToken: newRefresh });

        resolveQueue(null, accessToken);

        original.headers.Authorization = `Bearer ${accessToken}`;
        return api(original);
      } catch (e) {
        resolveQueue(e, null);
        tokenStorage.clear();
        window.location.href = "/login";
        return Promise.reject(e);
      } finally {
        isRefreshing = false;
      }
    }

    return Promise.reject(error);
  }
);
