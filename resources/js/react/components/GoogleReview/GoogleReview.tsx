import { apiUrl } from "../../constant/api-url";
import { useEffect, useState } from "react";
import axiosInstance, {tokenSPAVerify} from "../../api/axios";
import LoadingIndicator from "../indicator_loading/LoadingIndicator";

const GoogleReview = () => {
    const [reviews, setReviews] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        const fetchReviews = async () => {
            try {

                const  token:string = await tokenSPAVerify();

                const response = await axiosInstance.get(
                     apiUrl.publicUrl.googleReview, {
                         headers:{
                             "Authorization": token,
                         }
                    }
                );
                //setReviews(response.data);
                console.log(response.data)
            } catch (err) {
                // @ts-ignore
                //setError(err.message);
                console.log(response)
            } finally {
                setLoading(false);
            }
        };
         fetchReviews();
    }, []);

    if (loading) return <LoadingIndicator></LoadingIndicator>;
    if (error) return <p>Errore: {error}</p>;

    return (
        <div>
            <h2>Recensioni Google</h2>
            <ul>
                {reviews.map((review : Review, index:number ) => (
                    <div key={index}>
                        <li>{review.textReview}</li>
                        <li>{review.author} </li>
                        <li>{review.rating} </li>
                        <li>{review.time}</li>
                    </div>
                ))}
            </ul>
        </div>
    );
};

export default GoogleReview;
