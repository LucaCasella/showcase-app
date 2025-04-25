import React, {useContext} from 'react';
import './square-section.css';
import {LanguageContext} from "../language_context/LanguageProvider";

const SquaresSection = () => {
    const {languageData} = useContext(LanguageContext);

    return (
        <div className="w-full lg:w-3/4 mx-auto p-4">
            <div className='h-auto items-center flex flex-col md:flex-row gap-4 justify-between'>
                <div className='w-full md:w-1/2 flex flex-col gap-4 justify-between'>
                    <a href='/albums' className='relative overflow-hidden aspect-video albums-background'>
                        <div className="absolute inset-0 flex items-center justify-center">
                            <p className="text-white italic text-5xl text-center tracking-widest font-semibold">{languageData.home.squaresSection.albums}</p>
                        </div>
                    </a>
                    <div className='flex flex-row gap-4 justify-between'>
                        <a href='/about-us' className='relative w-1/2 aspect-video aboutus-background'>
                            <div className="absolute inset-0 flex items-center justify-center">
                                <p className="text-white italic text-xl lg:text-3xl text-center tracking-widest font-semibold">{languageData.home.squaresSection.aboutUs}</p>
                            </div>
                        </a>
                        <a href='/vendors' className='relative w-1/2 aspect-vide workwithus-background'>
                            <div className="absolute inset-0 flex items-center justify-center">
                                <p className="text-white italic text-xl lg:text-3xl text-center tracking-widest font-semibold">{languageData.home.squaresSection.vendors}</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div className='w-full md:w-1/2 flex flex-col gap-4 justify-between'>
                    <div className='flex flex-row gap-4 justify-between'>
                        <a href='/contacts' className='relative w-1/2 aspect-video contacts-background'>
                            <div className="absolute inset-0 flex items-center justify-center">
                                <p className="text-white italic text-xl lg:text-3xl text-center tracking-widest font-semibold">{languageData.home.squaresSection.contacts}</p>
                            </div>
                        </a>
                        <a href='/extra' className='relative w-1/2 aspect-video videos-background'>
                            <div className="absolute inset-0 flex items-center justify-center">
                                <p className="text-white italic text-xl lg:text-3xl text-center tracking-widest font-semibold">{languageData.home.squaresSection.extra}</p>
                            </div>
                        </a>
                    </div>
                    <a href='/locations' className='relative overflow-hidden aspect-video locations-background'>
                        <div className="absolute inset-0 flex items-center justify-center">
                            <p className="text-white italic text-5xl text-center tracking-widest font-semibold">{languageData.home.squaresSection.locations}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    );
};

export default SquaresSection;
