import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "../api/axios";


const Login = () => {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState("");
    const navigate = useNavigate();

    const handleSubmit = async (e:any) => {
        e.preventDefault();

        try {
            const response = await axios.post("/login", { email, password });
            localStorage.setItem("token", response.data.token);
            navigate("/dashboard");
        } catch (err) {
            // @ts-ignore
            setError(err.response?.data?.message || "An error occurred");
        }
    };

    return (
        <div>
            <h1>Login</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Email:</label>
                    <input
                        type="email"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}

                    />
                </div>
                <div>
                    <label>Password:</label>
                    <input
                        type="password"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                    />
                </div>
                <button type="submit">Login</button>
            </form>
            {error && <p style={{ color: "red" }}>{error}</p>}
        </div>
    );
};

export default Login;
