import React, {useEffect, useState} from 'react';
import {getPhotosByAlbumSlug} from "../services/getPhotosByAlbumSlug";
import axios from "axios";
import {useParams} from "react-router-dom";
import LightGallery from "lightgallery/react";
import 'lightgallery/css/lightgallery.css';
import 'lightgallery/css/lg-zoom.css';
import 'lightgallery/css/lg-thumbnail.css';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';

function LocationPage() {
    const {slug} = useParams();
    const [photos, setPhotos] = useState<Photo[]>([]);

    useEffect(() => {
        const fetchPhotos = async () => {
            if (!slug) return;
            try {
                const response = await getPhotosByAlbumSlug(slug);
                setPhotos(response.data);
            } catch (err) {
                if (axios.isAxiosError(err)) {
                    console.error("Errore API:", err.response?.data || err.message);
                } else {
                    console.error("Errore sconosciuto:", err);
                }
            }
        };

        fetchPhotos();
    }, [slug]);

    return (
        <div className='w-full lg:w-3/4 mx-auto p-4'>
            {!photos ? null : (
                <LightGallery
                    speed={500}
                    plugins={[lgThumbnail, lgZoom]}
                    download={false}
                    elementClassNames='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4'
                >
                    {
                        photos.map((photo, index) => (
                            <PhotoItem
                                key={index}
                                albumSlug={slug}
                                photoName={photo.name}
                                photoOriginal={photo.photo}
                                photoFhd={photo.photo_fhd}
                                photoType={photo.type}
                            />
                        ))
                    }
                </LightGallery>
            )}
        </div>
    );
}

function PhotoItem({albumSlug, photoName, photoOriginal, photoFhd, photoType}: any) {
    return (
        <a href={`/AK-Photos/${photoType}/${albumSlug}/original/${photoOriginal}`}>
            <img
                className="w-full aspect-[4/3] object-cover transition-transform duration-500 ease-out group-hover:scale-110 group-hover:opacity-60"
                src={`/AK-Photos/${photoType}/${albumSlug}/fhd/${photoFhd}`}
                alt={`${photoName}`}
                loading="lazy"
            />
        </a>
    );
}

export default LocationPage;
