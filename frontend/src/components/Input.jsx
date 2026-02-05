export default function Input({ label, ...props }) {
  return (
    <div className="w-full">
      <label className="text-sm text-white/70">{label}</label>
      <input
        {...props}
        className="mt-2 w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white outline-none placeholder:text-white/30 focus:border-white/20"
      />
    </div>
  );
}
