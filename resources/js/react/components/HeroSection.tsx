import React, {useContext} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";
import splitTextBySentences from "../helpers/helpers";

const HeroSection = () => {
    const {languageData} = useContext(LanguageContext);

    return (
        // todo: low - gray banner like BannerCTASection component
        <div className='w-full lg:w-3/4 mx-auto p-4'>
            <h1 className='text-2xl md:text-4xl text-center py-4 lg:py-10'>ANASTASIA KABAKOVA</h1>
            <p className='libre-baskerville text-center lg:text-xl lg:leading-10'>
                {splitTextBySentences(languageData.home.heroSection.text)}
            </p>
            <p className='libre-baskerville text-center lg:text-xl lg:leading-10'>
                {languageData.home.heroSection.studios}{' '}
                <a href='/contacts' className='text-black font-normal no-underline hover:underline'>
                    MODENA - BOLOGNA - IMOLA - FORLI - CESENA
                </a>
            </p>
            <div className="flex justify-center sm:justify-end mt-4">
                <a
                    href="/contacts"
                    className="group flex flex-row items-center gap-2 no-underline text-black"
                >
                    <span className="quote relative inline-block text-4xl">
                        {languageData.utils.quote}
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
