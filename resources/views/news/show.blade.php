@extends('layouts.main')
@section('header')
@foreach ($showList as $show)
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{ $show->title }}</h1>
        <small class="text-muted">Автор: {{ $show->author }}</small>
    </div>
</div>

@endsection
@section('content')
<img src="{{ $show->image }}" width="100%" height="100%">
<p class="lead text-muted">{{ $show->discription }}</p>

@endsection
@endforeach