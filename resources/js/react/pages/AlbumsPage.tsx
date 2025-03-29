import React, {useEffect, useState} from 'react';
import axiosInstance, {tokenSPAVerify} from "../api/axios";
import {apiUrl} from "../constant/api-url";
import axios from "axios";

function AlbumsPage() {
    const [albums, setAlbums] = useState<Album[]>([]);
    const [error, setError] = useState<string | null>(null);

    useEffect(() => {
        const fetchAlbums = async () => {
            try {
                const  token:string = await tokenSPAVerify();

                const response = await axiosInstance.get(
                    apiUrl.publicUrl.albums, {
                        headers:{
                            "Authorization": token,
                        },
                        params: {type: "wedding"},
                    }
                );
                setAlbums(response.data);
                console.log(response.data)
            } catch (err) {
                if (axios.isAxiosError(err)) {
                    console.error("Errore API:", err.response?.data || err.message);
                } else {
                    console.error("Errore sconosciuto:", err);
                }
            }
        };
        fetchAlbums();
    }, []);

    return (
        <div className='w-full lg:w-3/4 mx-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4'>
            <AlbumItem title={'location.title'} location={'location.location'} cover={'1_1742850506.jpg'} />
            <AlbumItem title={'location.title'} location={'location.location'} cover={'2_1742850522.jpg'} />
            <AlbumItem title={'location.title'} location={'location.location'} cover={'1_1742850506.jpg'} />
            {error ? (
                <p className="text-red-500">{error}</p>
            ) : (
                albums.map((album, index) => (
                    <AlbumItem key={index} title={album.title} location={album.location} />
                ))
            )}
        </div>
    );
}

function AlbumItem({title, location, cover}: any) {
    return (
        <div>
            <div className="relative overflow-hidden group mb-4">
                <img
                    className="w-full aspect-[4/3] object-cover group-hover:scale-110 transition-transform duration-500"
                    src={`/album_covers/${cover}`}
                    alt={`Immagine ${title}`}
                    loading="lazy"
                />
                <div className="absolute inset-0 items-center justify-center hidden group-hover:flex duration-500">
                    <p className="text-2xl tracking-widest font-semibold">{title}</p>
                </div>
            </div>
            <div className='flex items-center gap-10 px-4'>
                <span className='w-full h-[1px] bg-gray-500'/>
                <div className='text-center text-nowrap'>
                    {location ? location : ''}
                </div>
                <span className='w-full h-[1px] bg-gray-500'/>
            </div>
        </div>
    );
}

export default AlbumsPage;
