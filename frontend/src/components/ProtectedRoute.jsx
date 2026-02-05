import { Navigate } from "react-router-dom";
import { tokenStorage } from "../utils/tokenStorage";

export default function ProtectedRoute({ children }) {
  const access = tokenStorage.getAccess();
  if (!access) return <Navigate to="/login" />;
  return children;
}
