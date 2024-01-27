<div>
    <form method="post" action="{{ route('set.locale') }}">
        @csrf
        <label>
            <select name="locale" onchange="this.form.submit()">
                @foreach(config('app.locales') as $locale => $language)
                    <option value="{{ $language }}" @if(app()->getLocale() == $language) selected @endif>{{ $language }}</option>
                @endforeach
            </select>
        </label>
    </form>
</div>
