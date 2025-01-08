import {useEffect, useState} from "react";


const  TestAPI = () => {
    const [videoIds, setVideoIds] = useState<{
        lastName: string;
        firstName: string;
    }>();
    const [error, setError] = useState(null);

    const fetchVideoList = async () => {
        try {
            const response = await fetch("http://localhost:8000/api/test"); // URL API
            console.log("Chiamata API inviata...");

            if (!response.ok) {
                throw new Error(`Errore HTTP! Status: ${response.status}`);
            }

            const data = await response.json(); // Parse della risposta JSON
            console.log("Risposta API ricevuta:", data);
            setVideoIds(data); // Imposta i dati nello stato
        } catch (error) {
            // @ts-ignore
            console.error("Errore durante la chiamata API:", error.message);
            // @ts-ignore
            setError(error.message); // Imposta l'errore nello stato
        }
    };

    useEffect(() => {
        fetchVideoList().then(r => videoIds);
    }, []);

    // Render del componente
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Video List</h1>
            {videoIds ? (
                <ul>
                   <li>{videoIds.firstName}</li>
                    <li>{videoIds.lastName}</li>
                </ul>
            ) : (
                <p>No videos found</p>
            )}
        </div>
    );
};

export default TestAPI;
