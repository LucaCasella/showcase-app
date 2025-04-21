import React, {useContext, useEffect, useState} from 'react';
import {useLocation, useParams} from "react-router-dom";
import {getAlbumBySlug} from "../services/getAlbumBySlug";
import axios from "axios";
import Detail from "../components/Detail";
import {LanguageContext} from "../language_context/LanguageProvider";
import {PhotoProvider, PhotoView} from "react-photo-view";

const VendorPage = () => {
    const {slug} = useParams();
    const location = useLocation();
    const type = location.pathname.split('/')[1];
    const {language} = useContext(LanguageContext);
    const [detail, setDetail] = useState<Detail>();
    const [photos, setPhotos] = useState<Photo[]>([]);
    const [description, setDescription] = useState<string | null>(null);

    useEffect(() => {
        if (!detail) return;
        const description =
            language === 'it' ? detail.description_it :
            language === 'ru' ? detail.description_ru :
            detail.description_en
        setDescription(description);
    }, [language, detail]);

    useEffect(() => {
        const fetchAlbumBySlug = async () => {
            if (!slug) return;
            try {
                const response = await getAlbumBySlug(slug);
                setDetail(response.data.detail);
                setPhotos(response.data.photos);
            } catch (err) {
                if (axios.isAxiosError(err)) {
                    console.error("Errore API:", err.response?.data || err.message);
                } else {
                    console.error("Errore sconosciuto:", err);
                }
            }
        };

        fetchAlbumBySlug();
    }, [slug]);

    return (
        <div className='w-full lg:w-3/4 mx-auto p-4 flex flex-col gap-10'>
            {!detail ? null : (
                <Detail
                    description={description}
                    albumSlug={slug}
                    albumType={type}
                    ownerOriginal={detail.owner_image}
                    ownerFhd={detail.owner_image_fhd}
                    locationOriginal={detail.location_image}
                    locationFhd={detail.location_image_fhd}
                />
            )}

            {!photos ? null : (
                <PhotoProvider>
                    <div className='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4'>
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
                    </div>
                </PhotoProvider>
            )}
        </div>
    );
};

function PhotoItem({albumSlug, photoName, photoOriginal, photoFhd, photoType}: any) {
    return (
        <PhotoView src={`/AK-Photos/${photoType}/${albumSlug}/original/${photoOriginal}`}>
            <img
                className="w-full aspect-[4/3] object-cover transition-transform duration-500 ease-out group-hover:scale-110 group-hover:opacity-60"
                src={`/AK-Photos/${photoType}/${albumSlug}/fhd/${photoFhd}`}
                alt={`${photoName}`}
                loading="lazy"
            />
        </PhotoView>
    );
}

export default VendorPage;
