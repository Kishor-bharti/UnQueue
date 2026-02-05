import Navbar from "./Navbar";

export default function PageShell({ children }) {
  return (
    <div className="min-h-screen">
      <Navbar />
      <div className="mx-auto w-full max-w-5xl px-6 py-10">{children}</div>
    </div>
  );
}
