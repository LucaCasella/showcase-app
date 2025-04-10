import React, {useContext, useState} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";
import GoogleReview from "../components/GoogleReview/GoogleReview";
import './owner-image.scss';

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
                <div className="hidden xl:relative xl:flex my-10 flex-col md:flex-row justify-center">
                    {/* SX image */}
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

                    {/* Central text */}
                    <div className="relative h-10 lg:h-96 flex-grow mx-4 bg-white overflow-hidden">
                        {/* SX text */}
                        <div
                            className={`absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 ease-out ${activeImage === 'left' ? 'opacity-100' : 'opacity-0'}`}>
                            <p className={`text-center text-3xl font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'left' ? 'translate-x-0' : '-translate-x-full'}`}>Anastasia</p>
                            <p className={`text-center text-lg font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'left' ? 'translate-x-0' : '-translate-x-full'}`}>
                                {languageData.aboutUs.anastasia}
                            </p>
                        </div>
                        {/* DX text */}
                        <div
                            className={`absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 ease-out ${activeImage === 'right' ? 'opacity-100' : 'opacity-0'}`}>
                            <p className={`text-center text-3xl font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'right' ? 'translate-x-0' : 'translate-x-full'}`}>Matteo</p>
                            <p className={`text-center text-lg font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'right' ? 'translate-x-0' : 'translate-x-full'}`}>
                                {languageData.aboutUs.matteo}
                            </p>
                        </div>
                    </div>

                    {/* DX image */}
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

                <div className='flex xl:hidden my-10'>
                    <div className="flex flex-col md:flex-row mx-auto gap-4">
                        <OwnerImage
                            image="/assets/new/home.jpg"
                            name="Anastasia"
                            description={languageData.aboutUs.anastasia}
                        />
                        <OwnerImage
                            image="/assets/new/home.jpg"
                            name="Matteo"
                            description={languageData.aboutUs.matteo}
                        />
                    </div>
                </div>
            </div>

            <GoogleReview/>
        </div>
    );
}

export default AboutUs;

interface OwnerProps {
    image: string;
    name: string;
    description: string;
}

const OwnerImage = ({image, name, description}: OwnerProps) => {
    return (
        <div className="w-full h-full">
            <div className="owner-image-wrapper">
                <img src={image} alt='' className="owner-image"/>
                <div className="overlay">
                    <div className="overlay-text">
                        <h3>{name}</h3>
                        <p>{description}</p>
                    </div>
                </div>
            </div>
        </div>
    );
};
