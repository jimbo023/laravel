@extends('layouts.admin')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Добавить источник</h1>
</div>
<br>
@include('inc.messages')
<form method="post" action="{{ route('admin.sources.update', ["source" => $source]) }}">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="name">Источник</label>
        <input type="text" class="form-control" id="name" name="name" required="required" value="{{ $source->name }}">
    </div>
    <div class="form-group">
        <label for="urlSource">Ссылка на источник</label>
        <input type="text" class="form-control" id="urlSource" name="urlSource" required="required" value="{{ $source->urlSource }}">
    </div>
    <br />
    <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Сохранить</button>
</form>
@endsection