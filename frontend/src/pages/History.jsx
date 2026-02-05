import { useEffect, useState } from "react";
import PageShell from "../components/PageShell";
import { bookingsApi } from "../api/bookings";
import BookingCard from "../components/BookingCard";

export default function History() {
  const [bookings, setBookings] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");

  async function fetchBookings() {
    setLoading(true);
    setError("");

    try {
      const resp = await bookingsApi.list();
      setBookings(resp.data);
    } catch (e) {
      setError(e?.response?.data?.message || "Failed to load history");
    } finally {
      setLoading(false);
    }
  }

  useEffect(() => {
    fetchBookings();
  }, []);

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
      <div className="flex items-end justify-between">
        <div>
          <h1 className="text-2xl font-bold text-white">History</h1>
          <p className="mt-2 text-sm text-white/60">
            All your previous token entries.
          </p>
        </div>

        <button
          onClick={fetchBookings}
          className="rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm font-semibold text-white/80 hover:bg-white/10 hover:text-white"
        >
          Refresh
        </button>
      </div>

      {error && (
        <div className="mt-6 rounded-2xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
          {error}
        </div>
      )}

      <div className="mt-8 space-y-4">
        {loading ? (
          <div className="text-white/60">Loading...</div>
        ) : bookings.length === 0 ? (
          <div className="rounded-3xl border border-white/10 bg-white/5 p-8 text-white/60">
            No history found.
          </div>
        ) : (
          bookings.map((b) => (
            <BookingCard key={b.id} booking={b} onCancel={cancelBooking} />
          ))
        )}
      </div>
    </PageShell>
  );
}
