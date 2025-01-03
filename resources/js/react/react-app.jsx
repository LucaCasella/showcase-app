import React from 'react';
import ReactDOM from 'react-dom/client';

const App = () => <h1>React è stato aggiunto senza toccare altro!</h1>;

if (document.getElementById('react-root')) {
    const root = ReactDOM.createRoot(document.getElementById('react-root'));
    root.render(<App />);
}
