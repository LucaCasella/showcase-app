import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Counter from "./components/Counter";
import TestAPI from "./components/TestAPI";
function App() {

    return (
        <>
            <Router>
                <Routes>
                <Route path="/home" element={<Counter/>}/>
                <Route path="/album" element={<TestAPI/>}/>
                </Routes>
            </Router>
        </>
    );
}

export default App;
