@extends('public')

@section('content')
    <div class="videos-container">
        @foreach ($videos as $video)
            <div class="video-wrapper">
                <div class="video-info">
                    <h5 class="video-title">{{$video->title}}</h5>
                </div>
                <div class="video">
                    <video class="" width="100%" height="auto" controls controlsList="nodownload">
                        <source src="storage/videos/{{$video->video}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        @endforeach
    </div>
    <div id="player">

    </div>
    <button id="vid-target" value="7EZnVp1Ghow">7EZnVp1Ghow</button>
@endsection
<script>
    // let row_video = document.getElementById('vid-target').value;
    // console.log(row_video);
    //
    // function loadYouTubeVideo(videoId) {
    //     // Impostare le opzioni del player
    //     var options = {
    //         width: '640', // larghezza del player
    //         height: '360', // altezza del player
    //         videoId: videoId, // ID del video da riprodurre
    //         playerVars: {
    //             autoplay: 0, // autoplay
    //             controls: 1 // visualizza i controlli del player
    //         }
    //     };
    //
    //     // Carica il player nel div con id "player"
    //     var player = new YT.Player('player', options);
    // }
    //
    // // Funzione di inizializzazione
    // function init() {
    //     // Carica il player video con l'ID del video desiderato
    //     loadYouTubeVideo('7EZnVp1Ghow');
    // }
    //
    // // Esegui l'inizializzazione quando il documento è pronto
    // document.addEventListener('DOMContentLoaded', init);





    // function loadYouTubeVideo(videoId) {
    //     // Impostare le opzioni del player
    //     var options = {
    //         width: '640', // larghezza del player
    //         height: '360', // altezza del player
    //         videoId: videoId, // ID del video da riprodurre
    //         playerVars: {
    //             autoplay: 0, // autoplay
    //             controls: 1 // visualizza i controlli del player
    //         }
    //     };
    //
    //     // Carica il player nel div con id "player"
    //     var player = new YT.Player('player', options);
    // }
    //
    // // Funzione di inizializzazione
    // function init() {
    //     // Recupera gli ID dei video dal tuo endpoint sul server
    //     fetch('http://localhost:8000/api/videolist')
    //         .then(response => response.json())
    //         .then(videoIds => {
    //             // Itera su ciascun ID e carica il video corrispondente
    //             videoIds.forEach(videoId => {
    //
    //                 loadYouTubeVideo(videoId);
    //             });
    //         })
    //         .catch(error => {
    //             console.error('Si è verificato un errore durante il recupero degli ID dei video:', error);
    //         });
    // }
    //
    // // Esegui l'inizializzazione quando il documento è pronto
    // document.addEventListener('DOMContentLoaded', init);

    function loadYouTubeVideo(videoId, playerDivId) {
        // Impostare le opzioni del player
        let options = {
            width: '640', // larghezza del player
            height: '360', // altezza del player
            videoId: videoId, // ID del video da riprodurre
            playerVars: {
                autoplay: 0, // autoplay
                controls: 1 // visualizza i controlli del player
            }
        };

        // Carica il player nel div con id "player"
        let player = new YT.Player( playerDivId, options);
    }

    // Funzione per creare un nuovo div con un ID unico per il video
    function createVideoPlayerContainer(videoId) {
        let container = document.createElement('div'); // Crea un nuovo elemento div
        let uniqueId = 'player_' + videoId; // Genera un ID unico per il video
        container.setAttribute('id', uniqueId); // Assegna l'ID al div
        document.body.appendChild(container); // Aggiungi il div al body del documento
        return uniqueId;
    }

    // Funzione di inizializzazione
    function init() {
        // Recupera gli ID dei video dal tuo endpoint sul server
        fetch('http://localhost:8000/api/videolist')
            .then(response => response.json())
            .then(videoIds => {
                // Itera su ciascun ID e carica il video corrispondente
                videoIds.forEach(videoId => {
                    // Crea un nuovo div per il video e ottieni il suo ID unico
                    let playerDivId = createVideoPlayerContainer(videoId);
                    // Carica il video nel div appena creato
                    loadYouTubeVideo(videoId, playerDivId);
                });
            })
            .catch(error => {
                console.error('Si è verificato un errore durante il recupero degli ID dei video:', error);
            });
    }

    // Esegui l'inizializzazione quando il documento è pronto
    document.addEventListener('DOMContentLoaded', init);
</script>
<script src="https://www.youtube.com/iframe_api"></script>
