import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Login from "./components/Login";
import ProtectedRoute from "./components/ProtectedRoute";
import Logout from "./components/Logout";
import MainLayout from "./layout/MainLayout";
import './main.css';
import Contacts from "./pages/Contacts";
import HomeWrapper from "./components/HomeWrapper";
import AlbumsPage from "./pages/AlbumsPage";
import AlbumPage from "./pages/AlbumPage";
import VideosPage from "./pages/VideosPage";
import LocationsPage from "./pages/LocationsPage";
import LocationPage from "./pages/LocationPage";
import StudiosPage from "./pages/StudiosPage";
import AboutUs from "./pages/AboutUs";
import WorkWithUs from "./pages/WorkWithUs";
import Info from "./pages/Info";

function App() {
    return (
        <>
            <Router>
                <Routes>
                    <Route path='/' element={<MainLayout />}>
                        <Route index path="/home" element={<HomeWrapper />}/>
                        <Route path="/albums" element={<AlbumsPage/>}/>
                        <Route path="/albums/:id" element={<AlbumPage/>}/>
                        <Route path="/videos" element={<VideosPage/>}/>
                        <Route path="/locations" element={<LocationsPage/>}/>
                        <Route path="/locations/:id" element={<LocationPage/>}/>
                        {/*<Route path="/studios" element={<StudiosPage/>}/>*/}
                        <Route path="/about-us" element={<AboutUs/>}/>
                        <Route path="/work-with-us" element={<WorkWithUs/>}/>
                        {/*<Route path="/info" element={<Info/>}/>*/}
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
