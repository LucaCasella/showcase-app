import React, { useState } from 'react';
import './carousel.css'; // Stili CSS per il carousel

const Carousel = ({ images }) => {
    const [currentIndex, setCurrentIndex] = useState(0);

    const goToPrev = () => {
        setCurrentIndex((prevIndex) =>
            prevIndex === 0 ? images.length - 1 : prevIndex - 1
        );
    };

    const goToNext = () => {
        setCurrentIndex((prevIndex) =>
            prevIndex === images.length - 1 ? 0 : prevIndex + 1
        );
    };

    return (
        <div className="carousel">
            <button className="carousel-button prev" onClick={goToPrev}>
                &#10094;
            </button>
            <div className="carousel-content">
                {images.map((image, index) => (
                    <div
                        key={index}
                        className={`carousel-item ${
                            index === currentIndex ? 'active' : ''
                        }`}
                        style={{ transform: `translateX(-${currentIndex * 100}%)` }}
                    >
                        <img src={image} alt={`Slide ${index + 1}`} />
                    </div>
                ))}
            </div>
            <button className="carousel-button next" onClick={goToNext}>
                &#10095;
            </button>
        </div>
    );
};

export default Carousel;
