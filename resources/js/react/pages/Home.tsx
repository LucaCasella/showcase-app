import React from 'react';
import AlbumsSection from "../components/AlbumsSection";
import HeroSection from "../components/HeroSection";
import SocialSection from "../components/SocialSection";
import SquaresSection from "../components/SquaresSection";
import GoogleReview from "../components/GoogleReview/GoogleReview";

const Home = () => {
    return (
        <div className='flex flex-col py-4 gap-10'>
            <AlbumsSection />
            <HeroSection />
            <SocialSection />
            <SquaresSection />
            <GoogleReview />
        </div>
    );
};

export default Home;
