import React, {useContext} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";

const HeroSection = () => {
    const {languageData} = useContext(LanguageContext);

    return (
        <div className='py-4'>
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
        </div>
    );
};

export default HeroSection;
