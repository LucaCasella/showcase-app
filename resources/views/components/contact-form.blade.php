<div id="contacts" class="contacts mb-5">
    <h2 class="mb-3">@lang('home.discover-prices')</h2>
    <form action="{{ route('guest-form') }}" method="post">
        @csrf
        <div class="mb-2">
            <label for="name" class="form-label">@lang('home.full-name')</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name" required>
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">@lang('home.email-address')</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
            <div id="emailHelp" class="form-text">@lang('home.no-share')</div>
        </div>
        <div class="mb-2">
            <label for="phone" class="form-label">@lang('home.number-contact')</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-floating mb-2">
            <textarea class="form-control" id="comment" name="comment"></textarea>
            <label for="comment">@lang('home.leave-comment')</label>
        </div>
        <div class="mb-2">
            <input class="privacycheck mx-2" id="privacycheck" name="privacycheck" type="checkbox" required>
            <label for="privacycheck">@lang('home.privacy-check')</label>
            <a href="#privacy-modal" class="open-modal mx-3">@lang('home.privacy-info')</a>
        </div>
            <div class="block mt-4">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha_ent.site_key') }}"></div>
            </div>
        <div class="submit-container">
            <button id="contact-submit" type="submit" class="btn-lg form-submit btn btn-primary my-2">@lang('home.submit')</button>
        </div>
    </form>
    <div id="privacy-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h3>@lang('home.privacy-title')</h3>
            <p>@lang('home.privacy-content')</p>
        </div>
    </div>
</div>
<script>
    // Apri la modal quando viene cliccato il link
    document.querySelector('.open-modal').addEventListener('click', function() {
        document.getElementById('privacy-modal').style.display = 'block';
    });

    // Chiudi la modal quando viene cliccato il pulsante di chiusura
    document.querySelector('.close-modal').addEventListener('click', function() {
        document.getElementById('privacy-modal').style.display = 'none';
    });

    // Chiudi la modal quando viene cliccato al di fuori del contenuto della modal
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('privacy-modal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>
