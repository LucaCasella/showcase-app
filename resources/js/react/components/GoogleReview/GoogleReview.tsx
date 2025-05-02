import {apiUrl} from "../../constant/api-url";
import {useContext, useEffect, useState} from "react";
import axiosInstance, {tokenSPAVerify} from "../../api/axios";
import LoadingIndicator from "../indicator_loading/LoadingIndicator";
import axios from "axios";
import {Star, ChevronLeft, ChevronRight} from "lucide-react";
import {LanguageContext} from "../../language_context/LanguageProvider";

const GoogleReview = () => {
    const {languageData} = useContext(LanguageContext);
    const [reviews, setReviews] = useState<Review[]>([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [currentIndex, setCurrentIndex] = useState(0);
    const [isPaused, setIsPaused] = useState(false);
    const [transitionEnabled, setTransitionEnabled] = useState(true);
    const [touchStartX, setTouchStartX] = useState<number | null>(null);
    const [touchEndX, setTouchEndX] = useState<number | null>(null);

    useEffect(() => {
        const fetchReviews = async () => {
            try {
                const token: string = await tokenSPAVerify();
                const response = await axiosInstance.get(
                    apiUrl.publicUrl.googleReview,
                    {
                        headers: {
                            "Authorization": token,
                        },
                    }
                );
                setReviews(response.data);
            } catch (err) {
                if (axios.isAxiosError(err)) {
                    console.error("Errore API:", err.response?.data || err.message);
                } else {
                    console.error("Errore sconosciuto:", err);
                }
            } finally {
                setLoading(false);
            }
        };

        fetchReviews();
    }, []);

    useEffect(() => {
        if (reviews.length > 0 && !isPaused) {
            const interval = setInterval(() => {
                setCurrentIndex((prevIndex) => (prevIndex + 1) % reviews.length);
            }, 5000);
            return () => clearInterval(interval);
        }
    }, [reviews, isPaused]);

    const handleTouchStart = (e: React.TouchEvent) => {
        setTouchStartX(e.targetTouches[0].clientX);
        setIsPaused(true);
    };

    const handleTouchMove = (e: React.TouchEvent) => {
        setTouchEndX(e.targetTouches[0].clientX);
    };

    const handleTouchEnd = () => {
        if (touchStartX !== null && touchEndX !== null) {
            const diff = touchStartX - touchEndX;

            setTransitionEnabled(false);

            if (diff > 50) {
                setCurrentIndex((prevIndex) => (prevIndex + 1) % reviews.length);
            } else if (diff < -50) {
                setCurrentIndex((prevIndex) => (prevIndex - 1 + reviews.length) % reviews.length);
            }

            setTimeout(() => setTransitionEnabled(true), 50);
        }
        setTouchStartX(null);
        setTouchEndX(null);
        setIsPaused(false);
    };

    if (error) return null;

    return (
        <div className="relative w-full mx-auto overflow-hidden pt-10">
            <h2 className='text-2xl md:text-4xl text-center'>{languageData.utils.reviewsTitle}</h2>
            {
                loading ? (
                    <div className='w-full mx-auto flex justify-center my-10'>
                        <LoadingIndicator/>
                    </div>
                ) : (
                    <div className="my-10 relative group">
                        <button
                            onClick={() => setCurrentIndex((prevIndex) => (prevIndex - 1 + reviews.length) % reviews.length)}
                            className="hidden md:group-hover:flex absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-white/80 hover:bg-white border border-gray-300 rounded-full p-2 shadow transition"
                            aria-label="Previous review"
                        >
                            <ChevronLeft className="w-5 h-5 text-gray-700"/>
                        </button>

                        <button
                            onClick={() => setCurrentIndex((prevIndex) => (prevIndex + 1) % reviews.length)}
                            className="hidden md:group-hover:flex absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-white/80 hover:bg-white border border-gray-300 rounded-full p-2 shadow transition"
                            aria-label="Next review"
                        >
                            <ChevronRight className="w-5 h-5 text-gray-700"/>
                        </button>

                        <div
                            className={`flex ${transitionEnabled ? "transition-transform duration-500 ease-in-out" : ""}`}
                            style={{transform: `translateX(-${currentIndex * 100}%)`}}
                            onMouseEnter={() => setIsPaused(true)}
                            onMouseLeave={() => setIsPaused(false)}
                            onTouchStart={handleTouchStart}
                            onTouchMove={handleTouchMove}
                            onTouchEnd={handleTouchEnd}
                        >
                            {reviews.map((review, index) => (
                                <ReviewItem key={index} review={review}/>
                            ))}
                        </div>

                        <div className="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
                            {reviews.map((_, index) => (
                                <button
                                    key={index}
                                    className={`h-3 w-3 rounded-full ${index === currentIndex ? "bg-gray-800" : "bg-gray-400"}`}
                                    onClick={() => setCurrentIndex(index)}
                                />
                            ))}
                        </div>
                    </div>
                )
            }
        </div>
    );
};

interface ReviewItemProps {
    review?: Review;
}

const ReviewItem = ({review}: ReviewItemProps) => {
    return (
        <div className="min-w-full flex justify-center">
            <div
                className="max-w-2xl p-6 bg-white rounded-2xl shadow-lg text-center border border-gray-200 flex flex-col justify-between">
                <p className="libre-baskerville text-xl text-gray-800">{review?.author}</p>
                <p className="libre-baskerville text-gray-600 mt-2">{review?.textReview}</p>
                <div className="flex flex-row gap-2 items-center justify-center text-yellow-500 text-2xl mt-2">
                    <Star/>
                    <p className='m-0'>{review?.rating}</p>
                </div>
                <div className='grid grid-cols-3'>
                    <p className='col-span-1'>
                        <img
                            src='/assets/Google-Logo.png'
                            alt='google logo'
                            className='w-6 h-6'
                        />
                    </p>
                    <p className="col-span-1 text-gray-400 text-sm mt-1">{review?.time}</p>
                    <p className='col-span-1'/>
                </div>
            </div>
        </div>
    );
};

export default GoogleReview;
