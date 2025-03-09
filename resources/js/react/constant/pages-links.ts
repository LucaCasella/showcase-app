import { useContext } from "react";
import { LanguageContext } from "../language_context/LanguageProvider";

export const useMenuHeader = (): MenuItem[] => {
    const { languageData } = useContext(LanguageContext);

    return [
        {
            page: 'gallery',
            title: languageData.gallery,
            link: '/gallery',
            relatedLinks: [
                { title: languageData.album, link: '/album' },
                { title: languageData.video, link: '/video' },
                { title: languageData.locations, link: '/locations' },
            ]
        },
        { page: 'aboutUs', title: languageData.whoWeAre, link: '/about-us' },
        { page: 'workWithUs', title: languageData.workWithUs, link: '/work-with-us' },
        { page: 'contacts', title: languageData.contact, link: '/contacts' },
    ];
};



export interface MenuItem {
    page: string;
    title: string;
    link: string;
    dropdown?: string;
    relatedLinks?: Link[];
}

export interface Link {
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
