import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Login from "./components/Login";
import ProtectedRoute from "./components/ProtectedRoute";
import TestAPI from "./components/TestAPI";
import Counter from "./components/Counter";
import Logout from "./components/Logout";
function App() {

    return (
        <>
            <Router>
                <Routes>
                <Route path="/login2" element={<Login/>}/>
                    <Route
                        path="/dashboard"
                        element={
                            <ProtectedRoute>
                                <TestAPI />
                                <Logout></Logout>
                            </ProtectedRoute>
                        }
                    />
                <Route path="/counter" element={<Counter/>}/>
                </Routes>
            </Router>
        </>
    );
}

export default App;
