import React, {useContext} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";

const HeroSection = () => {
    const {languageData} = useContext(LanguageContext);

    return (
        // todo: low - gray banner like BannerCTASection component
        <div className='w-full lg:w-3/4 mx-auto p-4'>
            <h1 className='text-center py-4 lg:py-10'>ANASTASIA KABAKOVA</h1>
            <p className='text-center text-lg lg:text-2xl lg:leading-10'>
                {languageData.home.heroSection.text}
            </p>
            <p className='text-center text-lg lg:text-2xl lg:leading-10'>
                {languageData.home.heroSection.studios}{' '}
                <a href='/contacts' className='text-black font-normal no-underline hover:underline'>
                    MODENA - BOLOGNA - IMOLA - FORLI - CESENA
                </a>
            </p>
            <div className="flex justify-center mt-4">
                <a
                    href="/contacts"
                    className="group flex flex-row items-center gap-2 no-underline text-black"
                >
                    <span className="relative inline-block text-xl">
                        {languageData.home.lastAlbumsSection.button}
                        <span
                            className="absolute left-1/2 bottom-0 h-[1px] w-0 bg-black transition-all duration-300 ease-in-out group-hover:left-1/2 group-hover:w-full transform -translate-x-1/2"
                        />
                    </span>
                </a>
            </div>
        </div>
    );
};

export default HeroSection;
