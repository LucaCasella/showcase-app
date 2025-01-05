import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App.jsx'


const rootElement = document.getElementById('root');

// Monta React solo se il contenitore esiste
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(
        <React.StrictMode>
            <App />
        </React.StrictMode>
    );
}
