import { useState } from "react";
import { authApi } from "../api/auth";
import { useNavigate, Link } from "react-router-dom";
import Input from "../components/Input";
import Button from "../components/Button";

export default function Signup() {
  const nav = useNavigate();

  const [form, setForm] = useState({
    fullName: "",
    email: "",
    age: "",
    gender: "",
    password: "",
  });

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
      await authApi.signup({
        fullName: form.fullName,
        email: form.email,
        age: form.age ? Number(form.age) : null,
        gender: form.gender || null,
        password: form.password,
      });

      nav("/login");
    } catch (e) {
      setError(e?.response?.data?.message || "Signup failed");
    } finally {
      setLoading(false);
    }
  }

  return (
    <div className="min-h-screen px-6 py-12">
      <div className="mx-auto w-full max-w-md rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl">
        <h1 className="text-2xl font-bold text-white">Create your account</h1>
        <p className="mt-2 text-sm text-white/60">
          UnQueue helps you track your tokens cleanly.
        </p>

        {error && (
          <div className="mt-5 rounded-2xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
            {error}
          </div>
        )}

        <form className="mt-6 space-y-4" onSubmit={submit}>
          <Input
            label="Full Name"
            placeholder="Your full name"
            value={form.fullName}
            onChange={(e) => update("fullName", e.target.value)}
          />

          <Input
            label="Email"
            placeholder="you@example.com"
            value={form.email}
            onChange={(e) => update("email", e.target.value)}
          />

          <div className="grid grid-cols-2 gap-3">
            <Input
              label="Age"
              placeholder="25"
              value={form.age}
              onChange={(e) => update("age", e.target.value)}
            />
            <Input
              label="Gender"
              placeholder="Male/Female"
              value={form.gender}
              onChange={(e) => update("gender", e.target.value)}
            />
          </div>

          <Input
            label="Password"
            placeholder="Min 6 chars"
            type="password"
            value={form.password}
            onChange={(e) => update("password", e.target.value)}
          />

          <Button disabled={loading}>
            {loading ? "Creating..." : "Create account"}
          </Button>
        </form>

        <p className="mt-6 text-center text-sm text-white/60">
          Already have an account?{" "}
          <Link className="text-white underline" to="/login">
            Login
          </Link>
        </p>
      </div>
    </div>
  );
}
