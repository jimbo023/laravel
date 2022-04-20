@extends('layouts.app')
@section('content')
<div class="row offset-4">
    <h1>Hello, {{ Auth::user()->name }} </h1>
    @if(\Auth::user()->is_admin) <h5> <a href="{{ route('admin.index') }}"> Перейти в админку </a> </h5>@endif
    @if(!\Auth::user()->is_admin) <h5> <a href="{{ route('home') }}"> Перейти на главную страницу </a> </h5>@endif

    @if(\Auth::user()->avatar)
        <img src="{{ \Auth::user()->avatar }}" style="width: 200px">
    @endif
</div>
@endsection