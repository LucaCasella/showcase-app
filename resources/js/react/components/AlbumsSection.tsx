import React, {useContext, useEffect, useState} from 'react';
import axios from "axios";
import LoadingIndicator from "./indicator_loading/LoadingIndicator";
import {LanguageContext} from "../language_context/LanguageProvider";
import {getHighlightedAlbums} from "../services/getHighlightedAlbums";

const AlbumsSection = () => {
    const {languageData} = useContext(LanguageContext);
    const [highlightedAlbums, setHighlightedAlbums] = useState<Album[]>([]);
    const [loading, setLoading] = useState<boolean>(false);

    useEffect(() => {
        const fetchHighlightedAlbums = async () => {
            try {
                setLoading(true);
                const response = await getHighlightedAlbums(true, 'weddings');
                setLoading(false);
                setHighlightedAlbums(response.data?.slice(0, 6));
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

        fetchHighlightedAlbums();
    }, []);

    return (
        <div className='w-full lg:w-3/4 mx-auto p-4'>
            <h2 className='text-2xl md:text-4xl text-center p-4'>{languageData.home.lastAlbumsSection.title}</h2>
            <div className='w-full mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 py-4 md:py-10'>
                {!loading ? (
                    highlightedAlbums.map((highlightedAlbum, index) => (
                        <LastAlbumItem key={index} slug={highlightedAlbum.slug} title={highlightedAlbum.title}
                                       location={highlightedAlbum.location} cover={highlightedAlbum.cover} type={highlightedAlbum.type}/>
                    ))
                ) : (
                    <div className='w-full mx-auto col-span-3 flex justify-center'>
                        <LoadingIndicator/>
                    </div>
                )}
            </div>
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
}

function LastAlbumItem({slug, title, location, cover, type}: any) {
    let finalType = type;
    switch (type) {
        case 'weddings':
            finalType = 'albums';
            break;
        default: break;
    }

    return (
        <a href={`/albums/${slug}`} className='no-underline'>
            <div className="relative overflow-hidden group mb-4">
                <img
                    className="w-full aspect-[4/3] object-cover transition-transform duration-500 ease-out group-hover:scale-110 group-hover:opacity-60"
                    src={`AK-Photos/${finalType}/${slug}/${cover}`}
                    alt={`${title}`}
                    loading="lazy"
                />
                <div className="absolute inset-0 items-center justify-center hidden group-hover:flex duration-500">
                    <p className="great-vibes text-black text-2xl md:text-4xl text-center tracking-widest">{location}</p>
                </div>
            </div>
        </a>
    );
}

export default AlbumsSection;
