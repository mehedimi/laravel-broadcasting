@extends('layouts.app')

@section('content')
    <div class="container">
        <users-list :users="{{ $users->getCollection() }}"></users-list>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

@endsection
