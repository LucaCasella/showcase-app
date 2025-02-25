import React from 'react';

const Header = () => {
    return (
        <div>
            {/*DESKTOP NAVBAR*/}
            <div className='h-60 mx-auto max-w-4xl hidden md:flex flex-row items-center justify-center gap-28'>
                <a href='/gallery' className='text-decoration-none'>
                    <div className='text-xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                        GALLERIA
                    </div>
                </a>
                <a href='/about-us' className='text-decoration-none'>
                    <div
                        className='text-xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500 text-nowrap'>
                        CHI SIAMO
                    </div>
                </a>
                <a href='/home'>
                    <div className='w-44 text-7xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                        <img src='/assets/new/logoWhiteNoBG.png' alt='Anastasia Kabakova Logo'/>
                    </div>
                </a>
                <a href='/work-with-us' className='text-decoration-none'>
                    <div
                        className='text-xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                        LAVORA CON NOI
                    </div>
                </a>
                <a href='/contacts' className='text-decoration-none'>
                    <div
                        className='text-xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                        CONTATTI
                    </div>
                </a>
            </div>

            {/*MOBILE NAVBAR*/}
            <div className='grid grid-cols-3 align-items-center justify-content-center absolute md:hidden h-60 w-full px-4'>
                <div className='col-span-1'/>
                <div className='col-span-1 flex justify-center'>
                    <a href='/home'>
                        <div className='text-7xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                            <img src='/assets/logo.jpg' className='w-44' alt='Anastasia Kabakova Logo'/>
                        </div>
                    </a>
                </div>
                <div className='col-span-1 flex justify-end text-blue-500 font-bold items-end'>
                   MENU
                </div>
            </div>
        </div>
    );
};

export default Header;
