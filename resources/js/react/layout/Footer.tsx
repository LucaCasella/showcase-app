import React, {useContext, useState} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";
import PrivacyModal from "../components/modal/PrivacyModal";

const Footer = () => {
    const {languageData} = useContext(LanguageContext);
    const [isModalOpen, setModalOpen] = useState(false);

    const openModal = (e: any) => {
        e.preventDefault();
        window.scrollTo({top: 0, behavior: "smooth"})
        setModalOpen(true);
    };

    return (
        <div className='w-full mx-auto flex flex-col gap-4'>
            <div className='h-full w-full grid grid-cols-1 md:grid-cols-3 gap-8 px-4 py-10'>
                <div className='flex flex-col items-center gap-4'>
                    <p>{languageData.footer.phone}</p>
                    <a href="tel:+3803797287" className='no-underline text-black'>
                        <div>+39 333{' '}1671529</div>
                    </a>
                </div>

                <div className='flex flex-col items-center justify-between gap-4'>
                    <p>{languageData.footer.follow}</p>
                    <div className='flex gap-2 items-center'>
                        <a href="https://www.instagram.com/anastasiakabakova_fotografa/">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#1A1A1A" viewBox="0 0 50 50" width="50px"
                                 height="50px">
                                <path
                                    d="M 16 3 C 8.83 3 3 8.83 3 16 L 3 34 C 3 41.17 8.83 47 16 47 L 34 47 C 41.17 47 47 41.17 47 34 L 47 16 C 47 8.83 41.17 3 34 3 L 16 3 z M 37 11 C 38.1 11 39 11.9 39 13 C 39 14.1 38.1 15 37 15 C 35.9 15 35 14.1 35 13 C 35 11.9 35.9 11 37 11 z M 25 14 C 31.07 14 36 18.93 36 25 C 36 31.07 31.07 36 25 36 C 18.93 36 14 31.07 14 25 C 14 18.93 18.93 14 25 14 z M 25 16 C 20.04 16 16 20.04 16 25 C 16 29.96 20.04 34 25 34 C 29.96 34 34 29.96 34 25 C 34 20.04 29.96 16 25 16 z"/>
                            </svg>
                        </a>
                        <a href="https://www.matrimonio.com/fotografo-matrimonio/anastasia-kabakova--e308307"
                           className='flex items-center justify-center'>
                            <img src='/assets/seal_bodas_it_IT.png' alt='matimonio.com'/>
                        </a>
                    </div>

                </div>

                <div className='flex flex-col items-center gap-4'>
                    <p>{languageData.footer.email}</p>
                    <a href='mailto:infokabakova@yahoo.com'>infokabakova@yahoo.com</a>
                </div>
            </div>

            <div className='flex justify-center gap-4 lg:gap-16 px-4 py-10 text-center'>
                <a href="/">{languageData.footer.home}</a>
                <a href="/about-us">{languageData.footer.aboutUs}</a>
                <a href="/weddings">{languageData.footer.photos}</a>
                <a href="/work-with-us">{languageData.footer.workWithUs}</a>
                <a href="/contacts">{languageData.footer.contacts}</a>
            </div>

            <div className='flex flex-col sm:flex-row items-center justify-center py-10'>
                <p>© 2025, Anastasia | P.IVA 04057881205 |&nbsp;</p>
                <a href=""
                   onClick={openModal}
                >
                    {languageData.footer.privacyPolicy}
                </a>
                <PrivacyModal isOpen={isModalOpen} onClose={() => setModalOpen(false)} />
            </div>
        </div>
    );
};

export default Footer;
