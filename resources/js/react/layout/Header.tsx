import React from 'react';
import Carousel from "../components/carousel/Carousel";

const Header = () => {
    return (
        <>
            {/*DESKTOP NAVBAR*/}
            <div className='h-60 w-full hidden md:flex flex-row items-center justify-center gap-28'>
                <a href='/gallery' className='text-decoration-none'>
                    <div className='text-xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                        GALLERIA
                    </div>
                </a>
                <a href='/about-us' className='text-decoration-none'>
                    <div
                        className='text-xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                        CHI SIAMO
                    </div>
                </a>
                <a href='/home'>
                    <div className='text-7xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                        <img src='/assets/logo.jpg' className='w-44' alt='Anastasia Kabakova Logo'/>
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
            <div className='flex md:hidden h-60 w-full items-center justify-center px-4'>
                <div className='flex flex-1 justify-center'>
                    <a href='/home'>
                        <div
                            className='text-7xl text-white font-medium tracking-widest hover:underline underline-offset-8 transition ease-in-out duration-500'>
                            <img src='/assets/logo.jpg' className='w-44' alt='Anastasia Kabakova Logo'/>
                        </div>
                    </a>
                </div>
                <div className='ml-auto text-blue-500 font-bold'>
                    MENU
                </div>
            </div>
        </>
    );
};

export default Header;
