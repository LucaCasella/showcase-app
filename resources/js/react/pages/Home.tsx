import React from 'react';
import HeroSection from "../components/HeroSection";
import SquaresSection from "../components/SquaresSection";
import BannerCTASection from "../components/BannerCTASection";
import LastAlbumsSection from "../components/LastAlbumsSection";
import OtherServicesSection from "../components/OtherServicesSection";
import GoogleReview from "../components/GoogleReview/GoogleReview";
import SocialSection from "../components/SocialSection";

const Home = () => {
    return (
        <div className='flex flex-col py-4 gap-10'>
            <LastAlbumsSection />
            <HeroSection />
            <SocialSection />
            <SquaresSection />
            {/*<BannerCTASection />*/}
            {/*<OtherServicesSection />*/}
            <GoogleReview />
        </div>
    );
};

export default Home;
