import React from 'react';
import {useLocation} from "react-router-dom";

const Footer = () => {
    const location = useLocation();
    const isHomePage = location.pathname === '/home';
    const textColorClass = isHomePage ? 'text-white' : 'text-black';

    return (
        <div className='h-20 w-full flex flex-row justify-center items-center'>
            <p className={`text-center ${textColorClass} tracking-widest text-sm my-auto`}>© 2025, ayriika - P.IVA 04057881205</p>
        </div>
    );
};

export default Footer;
