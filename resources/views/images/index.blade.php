@extends('backoffice.dashboard')

@section('contents')
    <div>
        <h1>List Images</h1>
        <a href="{{route('images.create')}}">Add images</a>
    </div>
    <hr/>
    <div>image name</div>
@endsection
