@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<my-header :user="{{ Auth::user() }}"></my-header>
<router-view :user="{{ Auth::user() }}"></router-view>
@endsection
