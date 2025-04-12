import React, {useContext} from 'react';
import {ChevronRight} from "lucide-react";
import {LanguageContext} from "../language_context/LanguageProvider";

const BannerCTASection = () => {
    const {languageData} = useContext(LanguageContext);

    return (
        <div className="w-full min-h-96 flex items-center justify-center bg-gray-100 py-8">
            <div className="max-w-7xl w-full h-full mx-auto flex flex-col lg:flex-row items-center justify-between px-4">
                <div className="max-w-2xl h-full flex flex-col justify-evenly">
                    <h4 className="text-2xl text-center font-semibold italic mb-4">
                        {languageData.home.bannerSection.title}
                    </h4>
                    <div className="text-xl text-center font-normal leading-10">
                        <p>
                            {languageData.home.bannerSection.description1}
                        </p>
                        <p>
                            {languageData.home.bannerSection.description2}
                        </p>
                    </div>
                </div>

                <div className="group inline-block mt-4">
                    <a
                        href="/contacts"
                        className="flex flex-row items-center gap-2 no-underline text-black"
                    >
                        <span className="relative inline-block text-xl">
                            {languageData.home.bannerSection.button}
                            <span
                                className="absolute left-1/2 bottom-0 h-[1px] w-0 bg-black transition-all duration-300 ease-in-out group-hover:left-1/2 group-hover:w-full transform -translate-x-1/2"
                            />
                        </span>
                        <ChevronRight size={24} />
                    </a>
                </div>
            </div>
        </div>
    );
};

export default BannerCTASection;
