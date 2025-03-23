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

// export const menuHeader = [
//     {page: 'gallery', title: 'GALLERIA', link: '/gallery', dropdown: 'gallery', relatedLinks: [{title: 'ALBUM', link: '/album'}, {title: 'VIDEO', link: '/video'}, {title: 'LOCATIONS', link: '/locations'}]},
//     // {page: 'studios', title: 'STUDI', link: '/studios', dropdown: ''},
//     {page: 'aboutUs', title: 'CHI SIAMO', link: '/about-us', dropdown: ''},
//     {page: 'workWithUs', title: 'LAVORA CON NOI', link: '/work-with-us', dropdown: ''},
//     // {page: 'info', title: 'INFO', link: '/info', dropdown: ''},
//     {page: 'contacts', title: 'CONTATTI', link: '/contacts', dropdown: ''},
//     // todo: mettere accademy in studio se può interessare e studios e info con sotto link per info ???
//     // {page: 'accademy', title: 'ACCADEMY', link: '/accademy', dropdown: ''},
// ]
