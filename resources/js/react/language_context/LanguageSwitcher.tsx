import {useContext} from "react";
import {LanguageContext} from "./LanguageProvider";
import './languageSwitcher.css';

const LanguageSwitcher = () => {
    const {language, setLanguage} = useContext(LanguageContext);
    const handleLanguageChange = (event: { target: { value: any; }; }) => {
        setLanguage(event.target.value);
    };

    return (
        <select
            value={language}
            onChange={handleLanguageChange}
            id="languages"
            className="w-20 h-10 rounded-none bg-white text-black focus:border-slate-700 focus:ring-slate-700 text-md font-normal block dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white">
                <option value="en">EN</option>
                <option value="it">IT</option>
                <option value="ru">RU</option>
        </select>
    );
}

export default LanguageSwitcher;
