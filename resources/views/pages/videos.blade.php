@extends('public')

@section('content')
    <div class="videos-container row" id="videos-container">
    </div>

@endsection
<script>
    function loadYouTubeVideo(videoId, playerDivId) {
        // Impostare le opzioni del player
        let options = {
            // width: '640', // larghezza del player
            // height: '360', // altezza del player
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
        let videosContainer = document.getElementById('videos-container'); // Seleziona l'elemento contenitore
        let itemContainer = document.createElement('div'); // Crea un nuovo elemento div
        itemContainer.className = 'col-md-6 mb-4'; // Imposta la larghezza della colonna su schermi medi e grandi
        let uniqueId = 'player_' + videoId; // Genera un ID unico per il video
        itemContainer.setAttribute('id', uniqueId); // Assegna l'ID al div
        videosContainer.appendChild(itemContainer); // Aggiungi il div al div dei video
        return uniqueId;
    }

    // Funzione di inizializzazione
    function init() {
        // Recupera gli ID dei video dal tuo endpoint sul server
        fetch('{{env('APP_URL')}}/api/videolist')
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
