import React from 'react';
import LanguageSwitcher from "../language_context/LanguageSwitcher";

const MobileNavbar = () => (
    <div
        className='grid grid-cols-3 align-items-center justify-content-center lg:hidden h-60 w-full px-4'>
        {/*todo: maybe mobile switcher inside menu*/}
        <div className='relative col-span-1'>
            <div className="absolute top-1/2 transform -translate-y-1/2 lg:left-10">
                <LanguageSwitcher/>
            </div>
        </div>
        <div className='col-span-1 flex justify-center'>
            <a href='/home'>
                <div
                    className=''>
                    <img src='/assets/new/logoWhiteNoBG.png' className='w-44' alt='Anastasia Kabakova Logo'/>
                </div>
            </a>
        </div>
        <div className='col-span-1 flex justify-end text-white font-bold items-end'>
            MENU
        </div>
    </div>
);

export default MobileNavbar;
