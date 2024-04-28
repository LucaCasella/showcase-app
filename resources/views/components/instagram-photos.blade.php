<div class="other-services d-flex flex-col justify-content-center my-5">
    <div id="photo-container">
        <div class="photo1">
            <img src="" alt="Photo">
            <p class="caption"></p>
        </div>
        <div class="photo2">
            <img src="" alt="Photo">
            <p class="caption"></p>
        </div>
        <div class="photo3">
            <img src="" alt="Photo">
            <p class="caption"></p>
        </div>
        <div class="photo4">
            <img src="" alt="Photo">
            <p class="caption"></p>
        </div>
    </div>
</div>
<div id="instagram-feed-demo" class="instagram_feed"></div>
<script>
    fetch('https://graph.instagram.com/me/media?fields=id,media_type&access_token={{env('INSTAGRAM_ACCESS_TOKEN')}}')
        .then(function(response) {
            if (!response.ok) {
                throw new Error('Errore nella richiesta: ' + response.status);
            }
            return response.json();
        })
        .then(function(data) {
            var latestAlbums = data.data.filter(function(album) {
                return album.media_type !== 'VIDEO';
            }).slice(0, 4);

            console.log(latestAlbums);

            // Cicla su ogni album e aggiorna gli elementi HTML corrispondenti
            latestAlbums.forEach(function(album, index) {
                fetch('https://graph.instagram.com/' + album.id + '/children?fields=id,permalink&access_token={{env('INSTAGRAM_ACCESS_TOKEN')}}')
                    .then(function(response) {
                        if (!response.ok) {
                            throw new Error('Errore nella richiesta: ' + response.status);
                        }
                        return response.json();
                    })
                    .then(function(albumData) {
                        console.log(albumData.data[0]);

                        var className = '.photo' + (index + 1);

                        // var photoElement = document.querySelectorAll('.photo')[index];
                        var containerElement = document.getElementById('photo-container');
                        var photoElement = document.querySelector(className);

                        containerElement.appendChild(photoElement);

                        // Aggiorna gli elementi HTML con le informazioni ottenute dalla chiamata fetch
                        photoElement.querySelector('img').src = albumData.data[0].permalink; // Assumiamo che la prima foto dell'album sia sufficiente
                    })
                    .catch(function(error) {
                        console.log('Si è verificato un errore durante il recupero delle informazioni sull\'album:', error);
                    });
            });
        })
        .catch(function(error) {
            console.log('Si è verificato un errore:', error);
        });
</script>
