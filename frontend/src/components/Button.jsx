export default function Button({ children, ...props }) {
  return (
    <button
      {...props}
      className="w-full rounded-2xl bg-white px-4 py-3 font-semibold text-black hover:bg-white/90 disabled:opacity-50"
    >
      {children}
    </button>
  );
}
