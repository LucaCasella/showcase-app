import { useContext } from "react";
import { LanguageContext } from "../language_context/LanguageProvider";

export const useMenuHeader = (): MenuItem[] => {
    const {languageData}  = useContext(LanguageContext);

    return [
        {
            page: 'gallery',
            title: languageData.header.gallery,
            link: '/gallery',
            dropdown: 'gallery',
            relatedLinks: [
                { title: languageData.header.albums, link: '/albums' },
                { title: languageData.header.videos, link: '/videos' },
                { title: languageData.header.locations, link: '/locations' },
                { title: languageData.header.vendors, link: '/vendors' },
                { title: languageData.header.extra, link: '/extra' },
            ]
        },
        { page: 'aboutUs', title: languageData.header.aboutUs, link: '/about-us' },
        { page: 'workWithUs', title: languageData.header.workWithUs, link: '/work-with-us' },
        { page: 'contacts', title: languageData.header.contact, link: '/contacts' },
    ];
};

export interface MenuItem {
    page: string;
    title: string;
    link: string;
    dropdown?: string;
    relatedLinks?: LinkItem[];
}

export interface LinkItem {
    title: string;
    link: string;
}
