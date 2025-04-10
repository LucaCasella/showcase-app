import React, {useContext, useEffect, useState} from 'react';
import {getAlbumsByType} from "../services/getAlbumsByType";
import axios from "axios";
import LoadingIndicator from "./indicator_loading/LoadingIndicator";
import {ChevronRight} from "lucide-react";
import {LanguageContext} from "../language_context/LanguageProvider";

const LastAlbumsSection = () => {
    const {languageData} = useContext(LanguageContext);
    const [lastAlbums, setLastAlbums] = useState<Album[]>([]);
    const [loading, setLoading] = useState<boolean>(false);

    useEffect(() => {
        const fetchLastAlbums = async () => {
            try {
                setLoading(true);
                const response = await getAlbumsByType('weddings');
                setLoading(false);
                setLastAlbums(response.data.slice(0, 3));
            } catch (err) {
                if (axios.isAxiosError(err)) {
                    console.error("Errore API:", err.response?.data || err.message);
                } else {
                    console.error("Errore sconosciuto:", err);
                }
            } finally {
                setLoading(false);
            }
        };

        fetchLastAlbums();
    }, []);

    return (
        <div>
            <h2 className='p-4'>{languageData.home.lastAlbumsSection.title}</h2>
            <div className='w-full mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 py-4 md:py-10'>
                {!loading ? (
                    lastAlbums.map((lastAlbums, index) => (
                        <LastAlbumItem key={index} slug={lastAlbums.slug} title={lastAlbums.title}
                                       location={lastAlbums.location} cover={lastAlbums.cover} type={lastAlbums.type}/>
                    ))
                ) : (
                    <div className='w-full mx-auto col-span-3 flex justify-center'>
                        <LoadingIndicator/>
                    </div>
                )}
            </div>
            <div className="flex justify-center mt-4">
                <a
                    href="/albums"
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
}

function LastAlbumItem({slug, title, location, cover, type}: any) {
    return (
        <a href={`/${type}/${slug}`} className='no-underline'>
            <div className="relative overflow-hidden group mb-4">
                <img
                    className="w-full aspect-[4/3] object-cover transition-transform duration-500 ease-out group-hover:scale-110 group-hover:opacity-60"
                    src={`AK-Photos/${type}/${slug}/${cover}`}
                    alt={`${title}`}
                    loading="lazy"
                />
                <div className="absolute inset-0 items-center justify-center hidden group-hover:flex duration-500">
                    <p className="text-black text-3xl tracking-widest font-semibold">{title}</p>
                </div>
            </div>
            <div className='flex items-center gap-10 px-4'>
                <span className='w-full h-[1px] bg-gray-500'/>
                <div className='text-center text-nowrap text-black'>
                    {type}
                </div>
                <span className='w-full h-[1px] bg-gray-500'/>
            </div>
        </a>
    );
}

export default LastAlbumsSection;
