import React from "react";
import {useNavigate} from "react-router-dom";
import axiosInstance from "../api/axios";

const Logout = () => {

    const navigate = useNavigate();

    const handleLogout = async () => {
        try {
            await axiosInstance.post("/logout");
            localStorage.removeItem("token");
            navigate('/login2')
        } catch (err) {
            console.error("Logout failed:", err);
        }
    };

    return <button onClick={handleLogout}>Logout</button>;
};

export default Logout;
