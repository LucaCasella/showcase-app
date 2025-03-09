import React, { createContext, useState, useEffect } from 'react';
import it from '../language_context/it.json';
import en from '../language_context/en.json';
import ru from '../language_context/ru.json';

const languages = {
    it,
    en,
    ru
};
const LanguageContext = createContext({});

const LanguageProvider = ({ children }) => {
    const browserLanguage = navigator.language.split('-')[0];

    const supportedLanguages = Object.keys(languages);
    const defaultLanguage = supportedLanguages.includes(browserLanguage) ? browserLanguage : 'en';

    const storedLanguage = localStorage.getItem('language') || defaultLanguage;

    const [language, setLanguage] = useState(storedLanguage);

    useEffect(() => {
        localStorage.setItem('language', language);
    }, [language]);

    const languageData = languages[language] || languages.en;

    return (
        <LanguageContext.Provider value={{ language, setLanguage, languageData }}>
            {children}
        </LanguageContext.Provider>
    );
};

export { LanguageContext, LanguageProvider };

