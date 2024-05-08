<div>
    <div>
        <h2>Scoprimi anche su Instagram</h2>
    </div>
    <div id="ig-photo-container" class="my-2">
    </div>
</div>
<script>
    fetch('https://graph.instagram.com/v19.0/me/media?fields=id,media_type&access_token={{env('INSTAGRAM_ACCESS_TOKEN')}}')
        .then(function(response) {
            if (!response.ok) {
                throw new Error('Errore nella richiesta: ' + response.status);
            }
            return response.json();
        })
        .then(function(data) {
            let latestAlbums = data.data.filter(function(album) {
                return album.media_type !== 'VIDEO';
            }).slice(0, 4);

            // Cicla su ogni album e aggiorna gli elementi HTML corrispondenti
            latestAlbums.forEach(function(album, index) {
                fetch('https://graph.instagram.com/' + album.id + '/children?fields=id,media_url,permalink&access_token={{env('INSTAGRAM_ACCESS_TOKEN')}}')
                    .then(function(response) {
                        if (!response.ok) {
                            console.log(response);
                            throw new Error('Errore nella richiesta: ' + response.status);
                        }
                        return response.json();
                    })
                    .then(function(albumData) {

                        let divVarElement = document.createElement('div');
                        let aVarElement = document.createElement('a');
                        let imgVarElement = document.createElement('img');

                        let imageVarClass = '.photo' + (index + 1);
                        let permalinkVarClass = '.permalink' + (index + 1);

                        divVarElement.classList.add('instagram-container')
                        aVarElement.classList.add(permalinkVarClass);
                        imgVarElement.classList.add(imageVarClass);

                        aVarElement.setAttribute('target','_blank');
                        imgVarElement.setAttribute('alt', 'instagram_photo');

                        let containerElement = document.getElementById('ig-photo-container');

                        containerElement.appendChild(divVarElement);
                        divVarElement.appendChild(aVarElement);
                        aVarElement.appendChild(imgVarElement);

                        // Aggiorna gli elementi HTML con le informazioni ottenute dalla chiamata fetch
                        divVarElement.querySelector('a').href = albumData.data[0].permalink;
                        aVarElement.querySelector('img').src = albumData.data[0].media_url; // Assumiamo che la prima foto dell'album sia sufficiente
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
