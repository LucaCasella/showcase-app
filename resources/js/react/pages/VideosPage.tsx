import React, {useContext, useEffect} from 'react';
import './video.scss';
import {LanguageContext} from "../language_context/LanguageProvider";
import axiosInstance, {tokenSPAVerify} from "../api/axios";
import {apiUrl} from "../constant/api-url";
import splitTextBySentences from "../helpers/helpers";
import {Helmet} from "react-helmet";

function VideosPage() {
    const {languageData} = useContext(LanguageContext);

    useEffect(() => {
        // Funzione per caricare il video di YouTube nel player
        const loadYouTubeVideo = (videoId: any, playerDivId: string) => {
            const options = {
                videoId: videoId,
                playerVars: {
                    autoplay: 0,
                    controls: 1
                }
            };
            new YT.Player(playerDivId, options);
        };

        // Funzione per creare un nuovo div con un ID unico per ogni video
        const createVideoPlayerContainer = (videoId: string) => {
            const videosContainer = document.getElementById('videos-container');
            const itemContainer = document.createElement('div');
            itemContainer.className = 'col-md-6 mb-4 px-2';
            const uniqueId = 'player_' + videoId;
            itemContainer.setAttribute('id', uniqueId);
            // @ts-ignore
            videosContainer.appendChild(itemContainer);
            return uniqueId;
        };

        // Funzione di inizializzazione
        const init = async () => {
            try {

                const token: string = await tokenSPAVerify();
                // Chiamata API con autorizzazione
                const response = await axiosInstance.get(apiUrl.publicUrl.videos, {
                    headers: {
                        Authorization:  token,
                    },
                });

                console.log(response)

                const videoIds: string[] = response.data;

                videoIds.forEach((videoId: string) => {
                    const playerDivId = createVideoPlayerContainer(videoId);
                    loadYouTubeVideo(videoId, playerDivId);
                });
            } catch (error) {
                console.error('Si è verificato un errore durante il recupero degli ID dei video:', error);
            }
        };
        // Carica il player di YouTube quando l'API è pronta
        const loadYouTubeAPI = () => {
            if (window.YT) {
                init();
            } else {
                const script = document.createElement('script');
                script.src = 'https://www.youtube.com/iframe_api';
                script.onload = () => {
                    init();
                };
                document.body.appendChild(script);
            }
        };

        loadYouTubeAPI();
    }, []);

    return (
        <>
            <Helmet>
                <title>{languageData.meta.videos.title}</title>
                <meta name="description"
                      content={languageData.meta.videos.description}/>
                <meta name="keywords" content={languageData.meta.videos.keywords}/>
            </Helmet>

            <div className="libre-baskerville max-w-7xl mx-auto text-center leading-8 px-4 py-10">
                {splitTextBySentences(languageData.videos.description)}
            </div>
            <div className="max-w-7xl mx-auto videos-container row" id="videos-container" />
        </>
    );
}

export default VideosPage;
