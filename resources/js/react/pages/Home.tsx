import React from 'react';
import HeroSection from "../components/HeroSection";
import SquaresSection from "../components/SquaresSection";
import BannerCTASection from "../components/BannerCTASection";
import LastAlbumsSection from "../components/LastAlbumsSection";
import OtherServicesSection from "../components/OtherServicesSection";
import GoogleReview from "../components/GoogleReview/GoogleReview";

const Home = () => {
    return (
        <div className='w-full lg:w-3/4 mx-auto flex flex-col p-4 gap-10'>
            <HeroSection />
            <SquaresSection />
            <BannerCTASection />
            <LastAlbumsSection />
            <OtherServicesSection />
            <GoogleReview />
        </div>
    );
};

export default Home;
