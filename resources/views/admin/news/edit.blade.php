@extends('layouts.admin')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Редактировать новость</h1>
</div>
<br>
@include('inc.messages')
<form method="post" action="{{ route('admin.news.update', ["news" => $news] ) }}">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="category_id">Категория</label>
        <select name="category_id" id="category_id" class="form-control">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                @if($category->id === $news->category_id) selected @endif> {{
                $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="source_id">Источник</label>
        <select name="source_id" id="source_id" class="form-control">
            @foreach($sources as $source)
            <option value="{{ $source->id }}" @if($source->id === old('source_id')) selected @endif> {{
                $source->urlSource }}</option>
            @endforeach
            <option value="">Нет источника</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Наименование</label>
        <input type="text" class="form-control" id="title" name="title" required="required" value="{{$news->title}}">
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" id="author" name="author" value="{{$news->author}}">
    </div>
    <div class="form-group">
        <label for="title">Изображение</label>
        <input type="file" class="form-control" id="image" name="image" value="{{$news->image}}">
    </div>
    <div class="form-group">
        <label for="discription">Описание</label>
        <input type="text" class="form-control" id="discription" name="discription" required="required" value="{{$news->discription}}">
    </div>
    <br />
    <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Сохранить</button>
</form>
@endsection