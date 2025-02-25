export const menuHeader = [
    {page: 'gallery', title: 'GALLERIA', link: '/gallery', dropdown: 'gallery', relatedLinks: [{title: 'ALBUM', link: '/album'}, {title: 'VIDEO', link: '/video'}, {title: 'LOCATIONS', link: '/locations'}]},
    {page: 'studio', title: 'STUDIO', link: '/studio', dropdown: ''},
    {page: 'aboutUs', title: 'CHI SIAMO', link: '/about-us', dropdown: ''},
    {page: 'workWithUs', title: 'LAVORA CON NOI', link: '/work-with-us', dropdown: ''},
    {page: 'info', title: 'INFO', link: '/info', dropdown: ''},
    {page: 'contacts', title: 'CONTATTI', link: '/contacts', dropdown: ''},
]

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
