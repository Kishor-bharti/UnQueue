import { NavLink, useNavigate } from "react-router-dom";
import { tokenStorage } from "../utils/tokenStorage";
import { authApi } from "../api/auth";

export default function Navbar() {
  const nav = useNavigate();

  async function logout() {
    try {
      const refreshToken = tokenStorage.getRefresh();
      if (refreshToken) {
        await authApi.logout(refreshToken);
      }
    } catch (e) {
      // ignore
    } finally {
      tokenStorage.clear();
      nav("/login");
    }
  }

  const linkClass = ({ isActive }) =>
    `rounded-xl px-4 py-2 text-sm font-medium transition ${
      isActive
        ? "bg-white text-black"
        : "text-white/70 hover:bg-white/10 hover:text-white"
    }`;

  return (
    <div className="sticky top-0 z-50 border-b border-white/10 bg-[#0b0f19]/70 backdrop-blur">
      <div className="mx-auto flex w-full max-w-5xl items-center justify-between px-6 py-4">
        <div className="flex items-center gap-3">
          <div className="grid h-10 w-10 place-items-center rounded-2xl bg-white text-black font-black">
            UQ
          </div>
          <div>
            <div className="text-white font-semibold leading-tight">UnQueue</div>
            <div className="text-xs text-white/50 -mt-0.5">
              Token tracker
            </div>
          </div>
        </div>

        <div className="flex items-center gap-2">
          <NavLink to="/dashboard" className={linkClass}>
            Dashboard
          </NavLink>
          <NavLink to="/history" className={linkClass}>
            History
          </NavLink>

          <button
            onClick={logout}
            className="ml-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white/80 hover:bg-white/10 hover:text-white"
          >
            Logout
          </button>
        </div>
      </div>
    </div>
  );
}
