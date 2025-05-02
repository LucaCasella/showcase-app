import React, {useEffect, useState} from 'react';
import axios from "axios";
import {getAlbumsByType} from "../services/getAlbumsByType";
import LoadingIndicator from "../components/indicator_loading/LoadingIndicator";

function AlbumsPage() {
    const [albums, setAlbums] = useState<Album[]>([]);
    const [loading, setLoading] = useState<boolean>(false);

    useEffect(() => {
        const fetchWeddings = async () => {
            try {
                setLoading(true);
                const response = await getAlbumsByType('weddings');
                setLoading(false);
                setAlbums(response.data);
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

        fetchWeddings();
    }, []);

    return (
        <div className='w-full lg:w-3/4 mx-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4'>
            {!loading ? (
                albums.map((album, index) => (
                    <AlbumItem key={index} slug={album.slug} title={album.title} location={album.location}
                               cover={album.cover}/>
                ))
            ) : (
                <div className='w-full mx-auto col-span-3 flex justify-center'>
                    <LoadingIndicator/>
                </div>
            )}
        </div>
    );
}

function AlbumItem({slug, title, location, cover}: any) {
    return (
        <a href={`/albums/${slug}`} className='no-underline mb-4'>
            <div className="relative overflow-hidden group mb-4">
                <img
                    className="w-full aspect-[4/3] object-cover transition-transform duration-500 ease-out group-hover:scale-110 group-hover:opacity-60"
                    src={`AK-Photos/weddings/${slug}/${cover}`}
                    alt={`${title}`}
                    loading="lazy"
                />
                <div className="absolute inset-0 items-center justify-center hidden group-hover:flex duration-500">
                    <p className="great-vibes text-black text-3xl md:text-5xl text-center tracking-widest">{title}</p>
                </div>
            </div>
            <div className='flex items-center gap-10 px-4'>
                <span className='w-full h-[1px] bg-gray-500'/>
                <div className='great-vibes text-2xl text-center text-nowrap text-black tracking-widest'>
                    {location}
                </div>
                <span className='w-full h-[1px] bg-gray-500'/>
            </div>
        </a>
    );
}

export default AlbumsPage;
