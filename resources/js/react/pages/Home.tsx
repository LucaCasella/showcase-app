import React from 'react';
import Carousel from "../components/carousel/Carousel";
import GoogleReview from "../components/GoogleReview/GoogleReview";


const Home = () => {
    return (
        <div className='text-7xl flex flex-col justify-center items-center'>
            {/*HOME*/}
            <GoogleReview></GoogleReview>
            <Carousel />
        </div>
    );
};

export default Home;
