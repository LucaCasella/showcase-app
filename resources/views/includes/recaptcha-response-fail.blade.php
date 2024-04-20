@if ($errors->has('g-recaptcha-response'))
    <div id="errore-r" class="failed-captcha">
        {{'Recaptcha Failed!!!'}}
    </div>
@endif
<style>
    .failed-captcha{
        border-radius: 5px;
        border: red solid 2px;
        background: #ee7c81;
        margin: 0 auto 1em auto;
        width: 90%;
        padding: 0.5em;
    }
</style>

