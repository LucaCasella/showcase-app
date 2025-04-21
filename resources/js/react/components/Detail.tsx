import React, {useContext} from "react";
import {PhotoProvider, PhotoView} from "react-photo-view";
import 'react-photo-view/dist/react-photo-view.css';
import {LanguageContext} from "../language_context/LanguageProvider";
import {ChevronRight} from "lucide-react";

function Detail({description, albumSlug, albumType, ownerOriginal, ownerFhd, locationOriginal, locationFhd}: any) {
    const {languageData} = useContext(LanguageContext);

    return (
        <PhotoProvider>
            <div className="flex flex-col items-center gap-6">
                <div className="w-full flex flex-col sm:flex-row justify-between gap-4">
                    {!locationFhd ? null : (
                        <PhotoView src={`/AK-Photos/${albumType}/${albumSlug}/${locationOriginal}`}>
                            <img
                                src={`/AK-Photos/${albumType}/${albumSlug}/${locationFhd}`}
                                alt="Location"
                                className="w-full sm:w-[280px] md:max-w-1/2 xl:w-[400px] aspect-[4/3] object-cover cursor-pointer"
                            />
                        </PhotoView>
                    )}

                    {!ownerFhd ? null : (
                        <PhotoView src={`/AK-Photos/${albumType}/${albumSlug}/${ownerOriginal}`}>
                            <img
                                src={`/AK-Photos/${albumType}/${albumSlug}/${ownerFhd}`}
                                alt="Owner"
                                className="w-full sm:w-[280px] md:max-w-1/2 xl:w-[400px] aspect-[4/3] object-cover cursor-pointer"
                            />
                        </PhotoView>
                    )}
                </div>

                {!description ? null : (
                    <>
                        <div className="flex flex-col items-center text-center">
                            <p className="font-semibold text-xl mb-2">{languageData.aboutUs.mission}</p>
                            <p className="px-8 leading-8">{description}</p>
                        </div>
                        <div className="group inline-block">
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
                                <ChevronRight size={24}/>
                            </a>
                        </div>
                    </>
                )}
            </div>
        </PhotoProvider>
    );
}

export default Detail;
