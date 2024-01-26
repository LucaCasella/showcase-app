@extends('backoffice.dashboard')

@section('contents')
    <h1>add product</h1>
    <form action="" method="post">
        @csrf
        <div>
            <label for="image"></label>
            <input type="text" name="image" id="image">
        </div>
    </form>
@endsection
