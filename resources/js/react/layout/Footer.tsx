import React, {useContext, useState} from 'react';
import {useLocation} from "react-router-dom";
import {LanguageContext} from "../language_context/LanguageProvider";
import PrivacyModal from "../components/modal/PrivacyModal";

const Footer = () => {
    const {languageData} = useContext(LanguageContext);
    const [isModalOpen, setModalOpen] = useState(false);

    const openModal = (e: any) => {
        e.preventDefault();
        window.scrollTo({top: 0 , behavior: "smooth"})
        setModalOpen(true);
    };

    // const location = useLocation();
    // const isHomePage = location.pathname === '/home';
    // const textColorClass = isHomePage ? 'text-white' : 'text-black';
    return (
        <div className='h-40 md:h-full w-full grid grid-cols-1 md:grid-cols-3 gap-4 p-4'>
            <div className='grid-cols-1 flex justify-center items-center'>
                <div id="wp-ratedWA">
                    <a target="_blank"
                        href="https://www.matrimonio.com/fotografo-matrimonio/anastasia-kabakova--e308307"
                        rel="nofollow"
                        title="Anastasia Kabakova, vincitore Wedding Awards 2025 Matrimonio.com">
                        <img width="75" height="75"
                             alt="Anastasia Kabakova, vincitore Wedding Awards 2025 Matrimonio.com"
                             id="wp-ratedWA-img-2025"
                             src="https://cdn1.matrimonio.com/img/badges/2025/badge-weddingawards_it_IT.jpg"/>
                    </a>
                </div>
                <script type="text/javascript" src="https://cdn1.matrimonio.com/_js/wp-rated.js?v=4"></script>
                <script>wpShowRatedWAv3('308307','2025');</script>
            </div>

            <div className='grid grid-cols-1 h-full gap-2'>
                <p className={`text-nowrap text-center tracking-widest text-sm my-auto`}>© 2025,
                    ayriika -
                    P.IVA
                    04057881205
                </p>
                <p className='text-nowrap text-center tracking-widest text-sm my-auto'>
                    <a href="#" className='text-black no-underline hover:underline'>{languageData.footer.contacts}</a>
                </p>
                <p className='text-nowrap text-center tracking-widest text-sm my-auto'>
                    <a href="#" className='text-black no-underline hover:underline'>{languageData.footer.workWithUs}</a>
                </p>
                <div className='text-nowrap text-center tracking-widest text-sm my-auto'>
                    <a href="#" onClick={openModal} className='text-black no-underline hover:underline'>{languageData.footer.privacyPolicy}</a>
                    <PrivacyModal isOpen={isModalOpen} onClose={() => setModalOpen(false)} />
                </div>

            </div>

            <div className='grid-cols-1'>
                <div className='h-full flex flex-row sm:flex-col gap-4 items-center justify-center'>
                    <a href="">
                        {/*todo: high - add facebook link*/}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                            <path
                                d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"/>
                        </svg>
                    </a>

                    <a href="https://www.instagram.com/anastasiakabakova_fotografa/">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#1A1A1A" viewBox="0 0 50 50" width="50px"
                             height="50px">
                            <path
                                d="M 16 3 C 8.83 3 3 8.83 3 16 L 3 34 C 3 41.17 8.83 47 16 47 L 34 47 C 41.17 47 47 41.17 47 34 L 47 16 C 47 8.83 41.17 3 34 3 L 16 3 z M 37 11 C 38.1 11 39 11.9 39 13 C 39 14.1 38.1 15 37 15 C 35.9 15 35 14.1 35 13 C 35 11.9 35.9 11 37 11 z M 25 14 C 31.07 14 36 18.93 36 25 C 36 31.07 31.07 36 25 36 C 18.93 36 14 31.07 14 25 C 14 18.93 18.93 14 25 14 z M 25 16 C 20.04 16 16 20.04 16 25 C 16 29.96 20.04 34 25 34 C 29.96 34 34 29.96 34 25 C 34 20.04 29.96 16 25 16 z"/>
                        </svg>
                    </a>

                    <a href="">
                        {/*todo: high - add youtube link*/}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#1A1A1A" viewBox="0 0 50 50" width="50px"
                             height="50px">
                            <path
                                d="M 44.898438 14.5 C 44.5 12.300781 42.601563 10.699219 40.398438 10.199219 C 37.101563 9.5 31 9 24.398438 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.398438 17 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.898438 40.5 17.898438 41 24.5 41 C 31.101563 41 37.101563 40.5 40.601563 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.101563 35.5 C 45.5 33 46 29.398438 46.101563 25 C 45.898438 20.5 45.398438 17 44.898438 14.5 Z M 19 32 L 19 18 L 31.199219 25 Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    );
};

export default Footer;
