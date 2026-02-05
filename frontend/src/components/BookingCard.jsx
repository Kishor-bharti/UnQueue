export default function BookingCard({ booking, onCancel }) {
  const status = booking.status;

  return (
    <div className="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-xl">
      <div className="flex items-start justify-between gap-4">
        <div>
          <div className="text-white font-semibold text-lg">
            {booking.organisationName}
          </div>
          <div className="mt-1 text-sm text-white/60">
            Token No:{" "}
            <span className="text-white font-medium">{booking.tokenNo}</span>
          </div>
          <div className="mt-1 text-xs text-white/40">
            {new Date(booking.createdAt).toLocaleString()}
          </div>
        </div>

        <div className="flex flex-col items-end gap-2">
          <div
            className={`rounded-full px-3 py-1 text-xs font-semibold ${
              status === "SUCCESSFUL"
                ? "bg-green-500/15 text-green-200 border border-green-500/20"
                : "bg-red-500/15 text-red-200 border border-red-500/20"
            }`}
          >
            {status}
          </div>

          {status !== "CANCELLED" && (
            <button
              onClick={() => onCancel(booking.id)}
              className="rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-xs font-semibold text-white/80 hover:bg-white/10 hover:text-white"
            >
              Cancel
            </button>
          )}
        </div>
      </div>
    </div>
  );
}
