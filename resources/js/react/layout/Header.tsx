import React, {useState} from 'react';
import {Link, menuHeader, MenuItem} from "../constant/pages-links";
import MobileNavbar from "../components/MobileNavbar";

const Header = () => {
    const [dropdown, setDropdown] = useState<string | null>(null);
    const centerIndex = Math.floor(menuHeader.length / 2);
    const firstHalf = menuHeader.slice(0, centerIndex);
    const secondHalf = menuHeader.slice(centerIndex);

    return (
        <div>
            {/*DESKTOP NAVBAR*/}
            <div className="h-60 mx-auto max-w-4xl hidden md:flex flex-row items-center justify-center gap-20">
                {/* Prima metà del menu */}
                {firstHalf.map((item) => (
                    <NavItem key={item.page} item={item} dropdown={dropdown} setDropdown={setDropdown}/>
                ))}

                {/* Immagine centrale */}
                <a href="/home" className="flex-shrink-0">
                    <div className="w-44 text-7xl text-white font-medium tracking-widest">
                        <img src="/assets/new/logoWhiteNoBG.png" alt="Anastasia Kabakova Logo"/>
                    </div>
                </a>

                {/* Seconda metà del menu */}
                {secondHalf.map((item) => (
                    <NavItem key={item.page} item={item} dropdown={dropdown} setDropdown={setDropdown}/>
                ))}
            </div>

            <MobileNavbar/>
        </div>
    );
};

export default Header;

interface NavItemProps {
    item: MenuItem;
    dropdown: string | null;
    setDropdown: (dropdown: string | null) => void;
}
const NavItem: React.FC<NavItemProps> = ({item, dropdown, setDropdown }) => (
    <div
        className="relative"
        onMouseEnter={() => item.dropdown && setDropdown(item.dropdown)}
        onMouseLeave={() => setDropdown(null)}
    >
        <a href={item.link}
           className="relative text-xl text-white text-nowrap no-underline font-medium tracking-widest group">
            {item.title}
            <span className="absolute left-0 bottom-0 w-full h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform ease-in-out duration-200" />
        </a>
        {dropdown === item.dropdown && item.relatedLinks && (
            <div className="absolute flex-col gap-10 bg-white text-black mt-5 p-10 left-1/2 -translate-x-1/2">
                {item.relatedLinks.map((subItem: Link) => (
                    <a key={subItem.link} href={subItem.link}
                       className="block text-center text-black no-underline hover:underline tracking-widest px-4 py-2">
                        {subItem.title}
                    </a>
                ))}
            </div>
        )}
    </div>
);
