import React, { createContext, useState, useEffect, ReactNode } from 'react';
import it from '../language_context/it.json';
import en from '../language_context/en.json';
import ru from '../language_context/ru.json';

interface LanguageProviderProps {
    children: ReactNode;
}

type Language = 'it' | 'en' | 'ru';

type TranslationData = Record<string, any>;

interface LanguageContextType {
    language: Language;
    setLanguage: React.Dispatch<React.SetStateAction<Language>>;
    languageData: TranslationData;
}

const languages: Record<Language, TranslationData> = { it, en, ru };

const LanguageContext = createContext<LanguageContextType>({
    language: 'en',
    setLanguage: () => {},
    languageData: languages.en,
});

const LanguageProvider: React.FC<LanguageProviderProps> = ({ children }) => {
    const browserLanguage = navigator.language.split('-')[0] as Language;
    const supportedLanguages: Language[] = ['it', 'en', 'ru'];
    const defaultLanguage: Language = supportedLanguages.includes(browserLanguage) ? browserLanguage : 'en';

    const storedLanguage = localStorage.getItem('language') as Language | null;
    const initialLanguage: Language = storedLanguage && supportedLanguages.includes(storedLanguage) ? storedLanguage : defaultLanguage;

    const [language, setLanguage] = useState<Language>(initialLanguage);

    useEffect(() => {
        localStorage.setItem('language', language);
    }, [language]);

    const languageData = languages[language];

    return (
        <LanguageContext.Provider value={{ language, setLanguage, languageData }}>
            {children}
        </LanguageContext.Provider>
    );
};

export { LanguageContext, LanguageProvider };
