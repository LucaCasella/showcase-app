import React from "react";
import { Navigate } from "react-router-dom";

const ProtectedRoute = ({ children }: any) => {
    const token = localStorage.getItem("token");

    if (!token) {
        return <Navigate to="/counter" />;
    }

    return <>{children}</>;
};

export default ProtectedRoute;
