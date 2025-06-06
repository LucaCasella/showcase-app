import React, {useContext} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";

const Payoff = () => {
    const {languageData} = useContext(LanguageContext);

    return (
        <div className='max-w-min ml-4 mb-4 text-nowrap flex flex-col gap-3 lg:gap-20 text-white left-5 lg:left-10 bottom-5 lg:bottom-10'>
            {/* todo: low - add fade in to title */}
            <p className='great-vibes text-lg lg:text-4xl xl:text-6xl tracking-wide'>{languageData.header.payoff.title}</p>
            <div className='flex gap-10 items-center'>
                <p className='arial hidden md:flex text-sm lg:text-xl xl:text-2xl m-0'>{languageData.header.payoff.winner}</p>
                <div className='w-14 h-14 sm:w-20 sm:h-20'>
                    <div id="wp-ratedWA">
                        <a target="_blank"
                           href="https://www.matrimonio.com/fotografo-matrimonio/anastasia-kabakova--e308307"
                           rel="nofollow" title="Anastasia Kabakova, vincitore Wedding Awards 2025 Matrimonio.com">
                            <img width="75" height="75"
                                 alt="Anastasia Kabakova, vincitore Wedding Awards 2025 Matrimonio.com"
                                 id="wp-ratedWA-img-2025"
                                 src="https://cdn1.matrimonio.com/img/badges/2025/badge-weddingawards_it_IT.jpg"/>
                        </a>
                    </div>
                    <script type="text/javascript" src="https://cdn1.matrimonio.com/_js/wp-rated.js?v=4"></script>
                    <script>wpShowRatedWAv3('308307','2025');</script>
                </div>
            </div>
        </div>
    );
};

export default Payoff;
