import React, {useContext, useState} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";
import GoogleReview from "../components/GoogleReview/GoogleReview";

function AboutUs() {
    const {languageData} = useContext(LanguageContext);
    const [activeImage, setActiveImage] = useState('');

    return (
        // todo: sistemare foto chi siamo per mobile
        <div className='max-w-7xl mx-auto'>
            <div className='m-4'>
                <h2 className='text-4xl lg:text-6xl text-center tracking-widest font-semibold mt-10'>{languageData.aboutUs.mission}</h2>
                <p className='max-w-1/2 text-md lg:text-xl text-center tracking-widest leading-normal lg:leading-10 font-medium py-4 lg:py-10'>
                    {languageData.aboutUs.missionDesc}
                </p>

                <h2 className='text-4xl lg:text-6xl text-center tracking-widest font-semibold mt-10'>{languageData.aboutUs.aboutUs}</h2>
                <div className="relative flex my-10 flex-col md:flex-row">
                    {/* Immagine Sinistra */}
                    <div
                        className="relative transition-all duration-300"
                        onMouseEnter={() => setActiveImage('left')}
                        onMouseLeave={() => setActiveImage('')}
                    >
                        <img
                            src='https://placehold.co/600x400'
                            alt="Immagine sinistra"
                            className="h-[600px] w-[400px] object-cover"
                        />
                    </div>

                    {/* Area centrale per il testo */}
                    <div className="relative h-10 lg:h-96 flex-grow mx-4 bg-white overflow-hidden">
                        {/* Testo per immagine sinistra */}
                        <div
                            className={`absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 ease-out ${activeImage === 'left' ? 'opacity-100' : 'opacity-0'}`}>
                            <p className={`text-center text-3xl font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'left' ? 'translate-x-0' : '-translate-x-full'}`}>Anastasia</p>
                            <p className={`text-center text-lg font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'left' ? 'translate-x-0' : '-translate-x-full'}`}>
                                {languageData.aboutUs.anastasia}
                            </p>
                        </div>
                        {/* Testo per immagine destra */}
                        <div
                            className={`absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 ease-out ${activeImage === 'right' ? 'opacity-100' : 'opacity-0'}`}>
                            <p className={`text-center text-3xl font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'right' ? 'translate-x-0' : 'translate-x-full'}`}>Matteo</p>
                            <p className={`text-center text-lg font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'right' ? 'translate-x-0' : 'translate-x-full'}`}>
                                {languageData.aboutUs.matteo}
                            </p>
                        </div>
                    </div>

                    {/* Immagine Destra */}
                    <div
                        className="relative transition-all duration-300"
                        onMouseEnter={() => setActiveImage('right')}
                        onMouseLeave={() => setActiveImage('')}
                    >
                        <img
                            src='https://placehold.co/600x400'
                            alt="Immagine destra"
                            className="h-[600px] w-[400px] object-cover"
                        />
                    </div>
                </div>

                {/* todo: aggiungere carosello recensioni google */}
            </div>

            <GoogleReview />
        </div>
    );
}

export default AboutUs;
