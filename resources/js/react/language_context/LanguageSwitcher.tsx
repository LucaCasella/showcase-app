import {useContext} from "react";
import {LanguageContext} from "./LanguageProvider";
import './languageSwitcher.css';
const LanguageSwitcher= () =>{

    const {language, setLanguage } = useContext(LanguageContext);
    const handleLanguageChange = (event) => {
        setLanguage(event.target.value);
    };
    return (
        <div className='language-container'>
            <select value={language} onChange={handleLanguageChange}>
                <option value="en">EN</option>
                <option value="it">IT</option>
                <option value="ru">RU</option>
            </select>
        </div>
    );
}

export default LanguageSwitcher;
