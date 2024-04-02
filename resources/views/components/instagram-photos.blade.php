<div class="other-services d-flex flex-col justify-content-center my-5">
    <div id="photo-container">
        <div class="photo">
            <img src="" alt="Photo">
            <p class="caption"></p>
        </div>
        <div class="photo">
            <img src="" alt="Photo">
            <p class="caption"></p>
        </div>
        <div class="photo">
            <img src="" alt="Photo">
            <p class="caption"></p>
        </div>
        <div class="photo">
            <img src="" alt="Photo">
            <p class="caption"></p>
        </div>
    </div>
</div>
<script>
    $.ajax({
        url: 'https://api.instagram.com/v1/users/self/media/recent/?access_token=YOUR_ACCESS_TOKEN',
        dataType: 'jsonp',
        success: function(data) {
            var latestPhotos = data.data.slice(0, 4);

            // Cicla su ogni foto e aggiorna gli elementi HTML corrispondenti
            $('.photo').each(function(index) {
                var photo = latestPhotos[index];
                $(this).find('img').attr('src', photo.images.standard_resolution.url);
                $(this).find('.caption').text(photo.caption ? photo.caption.text : '');
            });
        }
    });
</script>
