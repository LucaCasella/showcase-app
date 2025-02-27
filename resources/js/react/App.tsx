import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Login from "./components/Login";
import ProtectedRoute from "./components/ProtectedRoute";
import Logout from "./components/Logout";
import MainLayout from "./layout/MainLayout";
import Home from "./pages/Home";
import './main.css';
import Contacts from "./pages/Contacts";

function App() {
    return (
        <>
            <Router>
                <Routes>
                    <Route path='/' element={<MainLayout />}>
                        <Route index path="/home" element={<Home />}/>
                        <Route path="/contacts" element={<Contacts/>}/>
                        <Route path="/login2" element={<Login/>}/>
                        <Route
                            path="/dashboard"
                            element={
                                <ProtectedRoute>
                                    <Logout></Logout>
                                </ProtectedRoute>
                            }
                        />
                    </Route>
                </Routes>
            </Router>
        </>
    );
}

export default App;
