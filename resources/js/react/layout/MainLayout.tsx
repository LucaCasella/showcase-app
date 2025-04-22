import React from 'react';
import Header from "./Header";
import Footer from "./Footer";
import { Outlet, useLocation } from "react-router-dom";
import WhatsappIcon from "../components/whatsapp/WhatsappIcon";

const MainLayout = () => {
    const location = useLocation();
    const isHomePage = location.pathname === '/';

    return (
        <>
            <div className={`w-full flex flex-col justify-between ${isHomePage ? 'home-background' : ''}`}>
                <Header />

            </div>
            <main>
                <Outlet />
            </main>
            <WhatsappIcon />
            <Footer />
        </>
    )
};

export default MainLayout;
