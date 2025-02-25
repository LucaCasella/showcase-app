import React from 'react';

const MobileNavbar = () => (
    <div
        className='grid grid-cols-3 align-items-center justify-content-center absolute md:hidden h-60 w-full px-4'>
        <div className='col-span-1'/>
        <div className='col-span-1 flex justify-center'>
            <a href='/home'>
                <div
                    className='text-7xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                    <img src='/assets/logo.jpg' className='w-44' alt='Anastasia Kabakova Logo'/>
                </div>
            </a>
        </div>
        <div className='col-span-1 flex justify-end text-blue-500 font-bold items-end'>
            MENU
        </div>
    </div>
);

export default MobileNavbar;
