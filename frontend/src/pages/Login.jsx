import { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import Input from "../components/Input";
import Button from "../components/Button";
import { authApi } from "../api/auth";
import { tokenStorage } from "../utils/tokenStorage";

export default function Login() {
  const nav = useNavigate();

  const [form, setForm] = useState({ email: "", password: "" });
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  function update(k, v) {
    setForm((p) => ({ ...p, [k]: v }));
  }

  async function submit(e) {
    e.preventDefault();
    setError("");
    setLoading(true);

    try {
      const resp = await authApi.login(form);
      tokenStorage.setTokens(resp.data);
      nav("/dashboard");
    } catch (e) {
      setError(e?.response?.data?.message || "Login failed");
    } finally {
      setLoading(false);
    }
  }

  return (
    <div className="min-h-screen px-6 py-12">
      <div className="mx-auto w-full max-w-md rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl">
        <h1 className="text-2xl font-bold text-white">Welcome back</h1>
        <p className="mt-2 text-sm text-white/60">
          Login to access your dashboard.
        </p>

        {error && (
          <div className="mt-5 rounded-2xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
            {error}
          </div>
        )}

        <form className="mt-6 space-y-4" onSubmit={submit}>
          <Input
            label="Email"
            placeholder="you@example.com"
            value={form.email}
            onChange={(e) => update("email", e.target.value)}
          />

          <Input
            label="Password"
            placeholder="Your password"
            type="password"
            value={form.password}
            onChange={(e) => update("password", e.target.value)}
          />

          <Button disabled={loading}>
            {loading ? "Logging in..." : "Login"}
          </Button>
        </form>

        <p className="mt-6 text-center text-sm text-white/60">
          New here?{" "}
          <Link className="text-white underline" to="/signup">
            Create account
          </Link>
        </p>
      </div>
    </div>
  );
}
