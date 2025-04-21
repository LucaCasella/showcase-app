import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import {LanguageProvider} from "./language_context/LanguageProvider";
import Login from "./components/Login";
import ProtectedRoute from "./components/ProtectedRoute";
import Logout from "./components/Logout";
import './main.css';
import MainLayout from "./layout/MainLayout";
import Home from "./pages/Home";
import AlbumsPage from "./pages/AlbumsPage";
import AlbumPage from "./pages/AlbumPage";
import VideosPage from "./pages/VideosPage";
import LocationsPage from "./pages/LocationsPage";
import LocationPage from "./pages/LocationPage";
import VendorsPage from "./pages/VendorsPage";
import VendorPage from "./pages/VendorPage";
import AboutUs from "./pages/AboutUs";
import WorkWithUs from "./pages/WorkWithUs";
import Contacts from "./pages/Contacts";
import OtherServicesSection from "./components/OtherServicesSection";

function App() {
    return (
        <>
            <LanguageProvider>
            <Router>
                <Routes>
                    <Route path='/' element={<MainLayout />}>
                        <Route index path="/home" element={<Home />}/>
                        <Route path="/weddings" element={<AlbumsPage/>}/>
                        <Route path="/weddings/:slug" element={<AlbumPage/>}/>
                        <Route path="/videos" element={<VideosPage/>}/>
                        <Route path="/locations" element={<LocationsPage/>}/>
                        <Route path="/locations/:slug" element={<LocationPage/>}/>
                        <Route path="/vendors" element={<VendorsPage/>}/>
                        <Route path="/vendors/:slug" element={<VendorPage/>}/>
                        <Route path="/extra" element={<OtherServicesSection/>}/>
                        <Route path="/about-us" element={<AboutUs/>}/>
                        <Route path="/work-with-us" element={<WorkWithUs/>}/>
                        <Route path="/contacts" element={<Contacts/>}/>
                        {/*<Route path="/login2" element={<Login/>}/>*/}
                        {/*<Route*/}
                        {/*    path="/dashboard"*/}
                        {/*    element={*/}
                        {/*        <ProtectedRoute>*/}
                        {/*            <Logout></Logout>*/}
                        {/*        </ProtectedRoute>*/}
                        {/*    }*/}
                        {/*/>*/}
                    </Route>
                </Routes>
            </Router>
            </LanguageProvider>
        </>
    );
}

export default App;
