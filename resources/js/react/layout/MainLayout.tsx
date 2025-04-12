import React from 'react';
import Header from "./Header";
import Footer from "./Footer";
import { Outlet, useLocation } from "react-router-dom";
import WhatsappIcon from "../components/whatsapp/WhatsappIcon";
import Payoff from "../components/Payoff";

const MainLayout = () => {
    const location = useLocation();
    const isHomePage = location.pathname === '/home';

    return (
        <>
            <div className={`w-full h-full flex flex-col justify-between ${isHomePage ? 'home-background' : ''}`}>
                <Header />
                {isHomePage ? <Payoff /> : null}
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
