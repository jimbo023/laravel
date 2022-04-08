@extends('layouts.admin')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Добавить источник</h1>
</div>
<br>
@include('inc.messages')
<form method="post" action="{{ route('admin.sources.store') }}">
    @csrf

    <div class="form-group">
        <label for="name">Источник</label>
        <input type="text" class="form-control" id="name" name="name" required="required">
    </div>
    <div class="form-group">
        <label for="urlSource">Ссылка на источник</label>
        <input type="text" class="form-control" id="urlSource" name="urlSource" required="required">
    </div>
    <br />
    <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Сохранить</button>
</form>
@endsection