import React, {useEffect, useState} from 'react';
import LanguageSwitcher from "../language_context/LanguageSwitcher";
import {useMenuHeader} from "../constant/pages-links";
import {useLocation} from "react-router-dom";
import {Link, Menu, X} from "lucide-react";

const MobileNavbar = () => {
    const menuHeader = useMenuHeader();
    const [isOpen, setIsOpen] = useState(false);
    const location = useLocation();
    const isHomePage = location.pathname === '/home';
    const logoSrc = isHomePage ? "/assets/new/logoWhiteNoBG.png" : "/assets/new/logoNoBG.png";
    const textColorClass = isHomePage ? 'text-white' : 'text-black';
    const [openIndex, setOpenIndex] = useState<number | null>(null);

    const toggleDropdown = (index: number) => {
        setOpenIndex(openIndex === index ? null : index);
    };

    useEffect(() => {
        if (isOpen) {
            document.body.style.overflow = "hidden";
        } else {
            document.body.style.overflow = "auto";
        }

        return () => {
            document.body.style.overflow = "auto";
        };
    }, [isOpen]);

    return (
        <div className='lg:hidden'>
            {/* Mobile Header*/}
            <div className='grid grid-cols-3 align-items-center justify-content-center lg:hidden h-32 w-full px-4'>
                <div className='col-span-1'>
                    {/*<div className="absolute top-1/2 transform -translate-y-1/2 lg:left-10">*/}
                    {/*    <LanguageSwitcher/>*/}
                    {/*</div>*/}
                </div>
                <div className='col-span-1 flex justify-center'>
                    <a href='/home'>
                        <div
                            className=''>
                            <img src={logoSrc} className='w-44' alt='Anastasia Kabakova Logo'/>
                        </div>
                    </a>
                </div>
                <div className={`col-span-1 flex justify-end font-bold items-end ${textColorClass} z-60`}>
                    <button onClick={() => setIsOpen(!isOpen)} className="text-white font-bold">
                        {
                            isOpen
                                ? <X size={32} color={isHomePage ? 'white' : 'black'}/>
                                : <Menu color={isHomePage ? 'white' : 'black'} size={32}/>
                        }
                    </button>
                </div>
            </div>

            {/* Menu Navbar */}
            <div
                className={`fixed top-32 left-0 w-full bg-white bg-opacity-80 z-50 transform ${isOpen ? "translate-x-0" : "translate-x-full"} transition-transform duration-300`}
                style={{height: "calc(100vh - 60px)"}}
            >
                <div className='h-full m-10'>
                    <ul className='flex flex-col justify-around gap-y-8 list-none p-0'>
                        {menuHeader.map((item, index) => (
                            <li key={index} className="flex flex-col items-center">
                                {item.relatedLinks && item.relatedLinks.length > 0 ? (
                                    <button
                                        onClick={() => item.relatedLinks ? toggleDropdown(index) : null}
                                        className={`flex justify-center text-xl text-black no-underline font-medium tracking-widest group`}>
                                        {item.title}
                                    </button>
                                ) : (
                                    <a href={item.link} className="flex justify-center text-xl text-black no-underline font-medium tracking-widest group">{item.title}</a>
                                )}

                                {item.relatedLinks && (
                                    <div
                                        className={`overflow-hidden transition-all duration-300 ease-in-out ${
                                            openIndex === index ? "max-h-40 opacity-100" : "max-h-0 opacity-0"
                                        }`}
                                    >
                                        <ul className="flex flex-col gap-2 pt-2 list-none p-0">
                                            {item.relatedLinks.map((subItem: any, subIndex: number) => (
                                                <li key={subIndex} className="text-center">
                                                    <a
                                                        href={subItem.link}
                                                        className="text-black text-lg font-medium tracking-wider hover:underline"
                                                    >
                                                        {subItem.title}
                                                    </a>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                )}
                                <span className='w-full h-[1px] bg-gray-500 mt-4'/>
                            </li>
                        ))}
                    </ul>
                    <div className='flex justify-center'>
                        <LanguageSwitcher />
                    </div>
                </div>
            </div>
        </div>
    );
}

export default MobileNavbar;
