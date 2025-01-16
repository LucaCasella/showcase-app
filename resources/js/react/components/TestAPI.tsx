import { useEffect, useState } from "react";
import axiosInstance from "../api/axios";

type User = {
    name: string;
    email: string;
};

const TestAPI = () => {
    const [user, setUser] = useState<User[]>([]);
    const [error, setError] = useState<string | null>(null);

    const fetchUserList = async () => {
        try {
            const response = await axiosInstance.get('/random-data');
            console.log(response)
            if (!response) {
                throw new Error(`Errore HTTP! Status: ${response}`);
            }

            const users = response.data.map((user: any) => ({
                name: user.name,
                email: user.email,
            }));

            setUser(users);

        } catch (error: any) {
            console.error("Errore durante la chiamata API:", error.message);
            setError(error.message);
        }
    };

    useEffect(() => {
        fetchUserList().then();
    }, []);


    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>User List</h1>
            {user.length > 0 ? (
                <ul>
                    {user.map((u, index) => (
                        <li key={index}>
                            <p>Name: {u.name}</p>
                            <p>Email: {u.email}</p>
                        </li>
                    ))}
                </ul>
            ) : (
                <p>No users found</p>
            )}
        </div>
    );
};

export default TestAPI;
