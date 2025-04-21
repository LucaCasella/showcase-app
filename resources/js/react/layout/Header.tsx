import React, {useState} from 'react';
import {LinkItem, useMenuHeader, MenuItem} from "../constant/pages-links";
import MobileNavbar from "../components/MobileNavbar";
import {useLocation} from "react-router-dom";
import LanguageSwitcher from "../language_context/LanguageSwitcher";

const Header = () => {
    const menuHeader = useMenuHeader();
    const [dropdown, setDropdown] = useState<string | null>(null);
    const location = useLocation();
    const isHomePage = location.pathname === '/home';
    const logoSrc = isHomePage ? "/assets/new/logoWhiteNoBG.png" : "/assets/new/logoNoBG.png";
    const textColorClass = isHomePage ? 'text-white' : 'text-black';
    const centerIndex = Math.floor(menuHeader.length / 2);
    const firstHalf = menuHeader.slice(0, centerIndex);
    const secondHalf = menuHeader.slice(centerIndex);

    return (
        <header className={`relative w-full flex flex-col justify-between items-end ${isHomePage ? "" : "h-auto"}`}>
            {/*DESKTOP NAVBAR*/}
            <nav
                className={`h-60 mx-auto max-w-7xl hidden lg:flex flex-row items-center justify-center gap-8 xl:gap-16 ${textColorClass}`}>
                {/* Prima metà del menu */}
                {firstHalf.map((item, index) => (
                    <NavItem key={index} item={item} dropdown={dropdown} setDropdown={setDropdown}
                             isHomePage={isHomePage}/>
                ))}

                {/* Immagine centrale */}
                <a href="/home" className="flex-shrink-0">
                    <div className="w-44 text-7xl text-white font-medium tracking-widest">
                        <img src={logoSrc} alt="Anastasia Kabakova Logo"/>
                    </div>
                </a>

                {/* Seconda metà del menu */}
                {secondHalf.map((item, index) => (
                    <NavItem key={index} item={item} dropdown={dropdown} setDropdown={setDropdown}
                             isHomePage={isHomePage}/>
                ))}

                <div className="absolute lg:top-auto lg:left-6">
                    <LanguageSwitcher/>
                </div>
            </nav>

            <MobileNavbar/>
        </header>
    );
};

export default Header;

interface NavItemProps {
    item: MenuItem;
    dropdown: string | null;
    setDropdown: (dropdown: string | null) => void;
    isHomePage: boolean;
}

export const NavItem: React.FC<NavItemProps> = ({item, dropdown, setDropdown, isHomePage}) => {
    const textColor = isHomePage ? 'text-white' : 'text-black';
    const underlineColor = isHomePage ? 'bg-white' : 'bg-black';
    const relatedContainerColor = isHomePage ? 'bg-white' : 'bg-gray-200';

    return (
        <div
            className="relative"
            onMouseEnter={() => item.dropdown && setDropdown(item.dropdown)}
            onMouseLeave={() => setDropdown(null)}
        >
            {item.relatedLinks && item.relatedLinks.length > 0 ? (
                <div
                    className={`relative justify-between text-xl no-underline font-medium tracking-widest group cursor-pointer`}>
                    <span className={`${textColor}`}>{item.title}</span>
                    <span
                        className={`absolute left-0 bottom-0 w-full h-[2px] ${underlineColor} scale-x-0 group-hover:scale-x-100 transition-transform ease-in-out duration-200`}/>
                </div>
            ) : (
                <a
                    href={item.link}
                    className={`relative justify-between text-xl no-underline font-medium tracking-widest group`}>
                    <span className={`${textColor}`}>{item.title}</span>
                    <span
                        className={`absolute left-0 bottom-0 w-full h-[2px] ${underlineColor} scale-x-0 group-hover:scale-x-100 transition-transform ease-in-out duration-200`}/>
                </a>
            )}

            {dropdown === item.dropdown && item.relatedLinks && (
                <div className="absolute flex-col gap-10 text-black left-1/2 -translate-x-1/2 pt-10 z-50">
                    <div className={`${relatedContainerColor} p-5`}>
                        {item.relatedLinks.map((subItem: LinkItem) => (
                            <a key={subItem.link} href={subItem.link}
                               className={`block ${relatedContainerColor} text-center text-black font-medium tracking-widest no-underline hover:underline underline-offset-8 px-4 py-2`}>
                                {subItem.title}
                            </a>
                        ))}
                    </div>
                </div>
            )}
        </div>
    );
};
