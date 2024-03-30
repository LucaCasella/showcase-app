<div id="contacts" class="contacts">
    <h2>@lang('home.contact-us')</h2>
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
        {{--        <div class="block my-2">--}}
{{--            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha_ent.site_key') }}"></div>--}}
{{--        </div>--}}
        <div class="mb-2">
            <input class="privacycheck mx-2" id="privacycheck" name="privacycheck" type="checkbox" required>
            <label for="privacycheck">@lang('home.privacy-check')</label>
            <a href="" class="mx-3">@lang('home.privacy-info')</a>
        </div>
        <button type="submit" class="btn btn-primary my-2">@lang('home.submit')</button>
    </form>
</div>
