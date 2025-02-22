import React from 'react';
import Header from "./Header";
import Footer from "./Footer";
import {Outlet} from "react-router-dom";

const MainLayout = () => {
    return (
        <>
            <div className='w-full h-full flex flex-col justify-between'>
                <Header />
                <main>
                    {/* Here are loaded the pages*/}
                    <Outlet />
                </main>
                <Footer />
            </div>
        </>
    )
};

export default MainLayout;
