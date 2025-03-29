import React, {useState} from 'react';
import './carousel.css'; // Stili CSS per il carousel
import carouselItems from "../../__mocks/carouselItems";
import CarouselItem from "./CarouselItem";
import {ChevronLeft, ChevronRight} from "lucide-react";

const Carousel = () => {
    const [currentIndex, setCurrentIndex] = useState(0);

    const goToPrev = () => {
        setCurrentIndex((prevIndex) =>
            prevIndex === 0 ? carouselItems.length - 1 : prevIndex - 1
        );
    };

    const goToNext = () => {
        setCurrentIndex((prevIndex) =>
            prevIndex === carouselItems.length - 1 ? 0 : prevIndex + 1
        );
    };

    return (
        <div className="carousel-container min-h-[400px] max-h-[600px]">
            <button className="carousel-button prev" onClick={goToPrev}>
                <ChevronLeft color='white' className='carousel-button' size={50} />
            </button>
            <div className="carousel-content">
                {
                    carouselItems.map((item,index) => {
                        let position = ''
                        if (index === currentIndex) {
                            position = "item-active";
                        } else if (index === (currentIndex - 1 + carouselItems.length) % carouselItems.length) {
                            position = "item-prev";
                        } else if (index === (currentIndex + 1) % carouselItems.length) {
                            position = "item-next";
                        }

                        return <CarouselItem key={index} item={item} position={position}/>
                    })
                }
            </div>
            <button className="carousel-button next" onClick={goToNext}>
                <ChevronRight color='white' className='carousel-button' size={50} />
            </button>
        </div>
    );
};

export default Carousel;
