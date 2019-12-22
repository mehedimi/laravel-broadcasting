@extends('layouts.app')

@section('content')
    <div class="container">
        <profile-posts user-id="{{ auth()->id() }}"/>
    </div>
@endsection
