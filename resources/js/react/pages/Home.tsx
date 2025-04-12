import React from 'react';
import HeroSection from "../components/HeroSection";
import SquaresSection from "../components/SquaresSection";
import LastAlbumsSection from "../components/LastAlbumsSection";
import GoogleReview from "../components/GoogleReview/GoogleReview";
import SocialSection from "../components/SocialSection";

const Home = () => {
    return (
        <div className='flex flex-col py-4 gap-10'>
            <LastAlbumsSection />
            <HeroSection />
            <SocialSection />
            <SquaresSection />
            <GoogleReview />
        </div>
    );
};

export default Home;
