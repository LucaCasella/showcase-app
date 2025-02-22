import React, { useState } from 'react';
import './carousel.css'; // Stili CSS per il carousel

const Carousel = ({ images }: Images) => {
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
                {images.map((image) => (
                    <div
                        key={image.id}
                        className={`carousel-item ${
                            image.id === currentIndex ? 'active' : ''
                        }`}
                        style={{ transform: `translateX(-${currentIndex * 100}%)` }}
                    >
                        <img src={image.url} alt={`Slide ${image.alt}`} />
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
