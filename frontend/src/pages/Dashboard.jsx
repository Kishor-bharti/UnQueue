import { useEffect, useState } from "react";
import PageShell from "../components/PageShell";
import Input from "../components/Input";
import Button from "../components/Button";
import { bookingsApi } from "../api/bookings";
import BookingCard from "../components/BookingCard";

export default function Dashboard() {
  const [form, setForm] = useState({
    organisationName: "",
    tokenNo: "",
  });

  const [loading, setLoading] = useState(false);
  const [listLoading, setListLoading] = useState(true);
  const [error, setError] = useState("");
  const [bookings, setBookings] = useState([]);

  function update(k, v) {
    setForm((p) => ({ ...p, [k]: v }));
  }

  async function fetchBookings() {
    setListLoading(true);
    try {
      const resp = await bookingsApi.list();
      setBookings(resp.data);
    } catch (e) {
      setError(e?.response?.data?.message || "Failed to load bookings");
    } finally {
      setListLoading(false);
    }
  }

  useEffect(() => {
    fetchBookings();
  }, []);

  async function createBooking(e) {
    e.preventDefault();
    setError("");
    setLoading(true);

    try {
      await bookingsApi.create({
        organisationName: form.organisationName,
        tokenNo: Number(form.tokenNo),
      });

      setForm({ organisationName: "", tokenNo: "" });
      await fetchBookings();
    } catch (e) {
      setError(e?.response?.data?.message || "Failed to create token");
    } finally {
      setLoading(false);
    }
  }

  async function cancelBooking(id) {
    setError("");
    try {
      await bookingsApi.cancel(id);
      await fetchBookings();
    } catch (e) {
      setError(e?.response?.data?.message || "Failed to cancel");
    }
  }

  return (
    <PageShell>
      <div className="grid grid-cols-1 gap-8 lg:grid-cols-[1fr_1.2fr]">
        {/* Left: Create */}
        <div className="rounded-3xl border border-white/10 bg-white/5 p-7 shadow-2xl">
          <h1 className="text-2xl font-bold text-white">Dashboard</h1>
          <p className="mt-2 text-sm text-white/60">
            Create a new token entry and manage your queue history.
          </p>

          {error && (
            <div className="mt-5 rounded-2xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
              {error}
            </div>
          )}

          <form className="mt-6 space-y-4" onSubmit={createBooking}>
            <Input
              label="Organisation Name"
              placeholder="e.g. Bank of India"
              value={form.organisationName}
              onChange={(e) => update("organisationName", e.target.value)}
            />

            <Input
              label="Token Number"
              placeholder="e.g. 14"
              value={form.tokenNo}
              onChange={(e) => update("tokenNo", e.target.value)}
            />

            <Button disabled={loading}>
              {loading ? "Creating..." : "Create token"}
            </Button>
          </form>
        </div>

        {/* Right: List */}
        <div>
          <div className="flex items-end justify-between">
            <div>
              <h2 className="text-xl font-bold text-white">Your tokens</h2>
              <p className="mt-1 text-sm text-white/60">
                Latest tokens appear first.
              </p>
            </div>

            <button
              onClick={fetchBookings}
              className="rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm font-semibold text-white/80 hover:bg-white/10 hover:text-white"
            >
              Refresh
            </button>
          </div>

          <div className="mt-6 space-y-4">
            {listLoading ? (
              <div className="text-white/60">Loading...</div>
            ) : bookings.length === 0 ? (
              <div className="rounded-3xl border border-white/10 bg-white/5 p-8 text-white/60">
                No tokens yet. Create your first one.
              </div>
            ) : (
              bookings.map((b) => (
                <BookingCard key={b.id} booking={b} onCancel={cancelBooking} />
              ))
            )}
          </div>
        </div>
      </div>
    </PageShell>
  );
}
