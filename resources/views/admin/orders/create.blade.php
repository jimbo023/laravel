@extends('layouts.admin')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Добавить новость</h1>
</div>
<br>
@include('inc.messages')
<form method="post" action="{{ route('admin.news.store') }}">
    @csrf

    <div class="form-group">
        <label for="category_id">Категория</label>
        <select name="category_id" id="category_id" class="form-control" required="required">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($category->id === old('category_id')) selected @endif> {{
                $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="source_id">Источник</label>
        <select name="source_id" id="source_id" class="form-control">
            <option>Нет источника</option>
            @foreach($sources as $source)
            <option value="{{ $source->id }}" @if($source->id === old('source_id')) selected @endif> {{
                $source->urlSource }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title">Наименование</label>
        <input type="text" class="form-control" id="title" name="title" required="required">
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" id="author" name="author" required="required">
    </div>
    <div class="form-group">
        <label for="title">Изображение</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="discription">Описание</label>
        <input type="text" class="form-control" id="discription" name="discription" required="required">
    </div>
    <br />
    <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Сохранить</button>
</form>
@endsection