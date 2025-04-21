interface Album {
    slug: string;
    title: string;
    location: string;
    cover: string;
    order: number;
    type: string;
    visible: boolean;
    updated_at: Date;
}

interface Detail {
    description_it: string;
    description_en: string;
    description_ru: string;
    owner_image: string;
    owner_image_fhd: string;
    location_image: string;
    location_image_fhd: string;
}

interface Photo {
    name: string;
    photo: string;
    photo_fhd: string;
    visible: boolean;
    order: number;
    type: string;
}
