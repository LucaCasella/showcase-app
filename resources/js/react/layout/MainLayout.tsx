import React from 'react';
import Header from "./Header";
import Footer from "./Footer";
import { Outlet, useLocation } from "react-router-dom";

const MainLayout = () => {
    const location = useLocation();
    const isHomePage = location.pathname === '/home';

    return (
        <>
            <div className={`w-full h-full flex flex-col justify-between ${isHomePage ? 'home-background' : ''}`}>
                <Header />
                <main>
                    <Outlet />
                </main>
                <Footer />
            </div>
        </>
    )
};

export default MainLayout;
