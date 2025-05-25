import React, {useContext} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";
import splitTextBySentences from "../helpers/helpers";

const OtherServicesSection = () => {
    const {languageData} = useContext(LanguageContext);

    return (
        <div className='w-full lg:w-3/4 mx-auto flex flex-col gap-10 py-4'>
            <h2 className='text-2xl md:text-4xl text-center'>{languageData.home.otherServicesSection.title}</h2>
            <div className='w-full h-full shadow-2xl'>
                <div className='flex w-full flex-col xl:flex-row gap-4 xl:gap-16 items-center p-4'>
                    <img src="/assets/new/prepost-marital.jpg" alt="pre/post marital image"
                         className='w-96 h-auto object-contain'/>
                    <div className='w-full flex flex-col justify-center'>
                        <h5 className='mb-3 text-center'>{languageData.home.otherServicesSection.service1.title}</h5>
                        <p className='libre-baskerville mx-auto md:px-4'>{splitTextBySentences(languageData.home.otherServicesSection.service1.description)}</p>
                        <div className="flex justify-center mt-4">
                            <a
                                href="/contacts"
                                className="group flex flex-row items-center gap-2 no-underline text-black"
                            >
                                <span className="great-vibes relative inline-block text-2xl">
                                    {languageData.home.otherServicesSection.cardButton}
                                    <span
                                        className="absolute left-1/2 bottom-0 h-[1px] w-0 bg-black transition-all duration-300 ease-in-out group-hover:left-1/2 group-hover:w-full transform -translate-x-1/2"
                                    />
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div className='w-full h-full shadow-2xl'>
                <div className='flex w-full flex-col xl:flex-row gap-4 xl:gap-16 items-center p-4'>
                    <img src="/assets/wedding-planner.jpg" alt="wedding planner image"
                         className='w-96 h-auto object-contain'/>
                    <div className='w-full flex flex-col justify-center'>
                        <h5 className='mb-3 text-center'>{languageData.home.otherServicesSection.service2.title}</h5>
                        <p className='libre-baskerville mx-auto md:px-4'>{splitTextBySentences(languageData.home.otherServicesSection.service2.description)}</p>
                        <div className="flex justify-center mt-4">
                            <a
                                href="/contacts"
                                className="group flex flex-row items-center gap-2 no-underline text-black"
                            >
                                <span className="great-vibes relative inline-block text-2xl">
                                    {languageData.home.otherServicesSection.cardButton}
                                    <span
                                        className="absolute left-1/2 bottom-0 h-[1px] w-0 bg-black transition-all duration-300 ease-in-out group-hover:left-1/2 group-hover:w-full transform -translate-x-1/2"
                                    />
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div className='w-full h-full shadow-2xl'>
                <div className='flex w-full flex-col xl:flex-row gap-4 xl:gap-16 items-center p-4'>
                    <img src="/assets/video-projection.jpg" alt="video projection image"
                         className='w-96 h-auto object-contain'/>
                    <div className='w-full flex flex-col'>
                        <h5 className='mb-3 text-center'>{languageData.home.otherServicesSection.service3.title}</h5>
                        <p className='libre-baskerville mx-auto md:px-4'>{splitTextBySentences(languageData.home.otherServicesSection.service3.description)}</p>
                        <div className="flex justify-center mt-4">
                            <a
                                href="/contacts"
                                className="group flex flex-row items-center gap-2 no-underline text-black"
                            >
                                <span className="great-vibes relative inline-block text-2xl">
                                    {languageData.home.otherServicesSection.cardButton}
                                    <span
                                        className="absolute left-1/2 bottom-0 h-[1px] w-0 bg-black transition-all duration-300 ease-in-out group-hover:left-1/2 group-hover:w-full transform -translate-x-1/2"
                                    />
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div className='w-full h-full shadow-2xl'>
                <div className='flex w-full flex-col xl:flex-row gap-4 xl:gap-16 items-center p-4'>
                    <img src="/assets/polaroid.jpeg" alt="polaroid image"
                         className='w-96 h-auto object-contain'/>
                    <div className='w-full flex flex-col'>
                        <h5 className='mb-3 text-center'>{languageData.home.otherServicesSection.service4.title}</h5>
                        <p className='libre-baskerville mx-auto md:px-4'>{splitTextBySentences(languageData.home.otherServicesSection.service4.description)}</p>
                        <div className="flex justify-center mt-4">
                            <a
                                href="/contacts"
                                className="group flex flex-row items-center gap-2 no-underline text-black"
                            >
                                <span className="great-vibes relative inline-block text-2xl">
                                    {languageData.home.otherServicesSection.cardButton}
                                    <span
                                        className="absolute left-1/2 bottom-0 h-[1px] w-0 bg-black transition-all duration-300 ease-in-out group-hover:left-1/2 group-hover:w-full transform -translate-x-1/2"
                                    />
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default OtherServicesSection;
