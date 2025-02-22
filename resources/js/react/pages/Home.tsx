import React from 'react';
import Carousel from "../components/carousel/Carousel";
import carouselImages from "../__mocks/carousel-images";

const Home = () => {
    return (
        <div className='text-blue-500 text-7xl'>
            <Carousel images={carouselImages} />
        </div>
    );
};

export default Home;
