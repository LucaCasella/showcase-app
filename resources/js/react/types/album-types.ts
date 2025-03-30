interface Album {
    slug: string;
    title: string;
    location: string;
    cover: string;
    order: number;
    visible: boolean;
    updated_at: Date;
}

interface Photo {
    name: string;
    photo: string;
    photo_fhd: string;
    visible: boolean;
    order: number;
    type: string;
}
