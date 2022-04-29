@extends('layouts.admin')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Добавить категорию</h1>
</div>
<br>
    @include('inc.messages')
    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" required="required">
        </div>
        <div class="form-group">
            <label for="discription">Описание</label>
            <textarea type="text" class="form-control" id="discription" name="discription" required="required"></textarea>
        </div>
        <br />
        <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Сохранить</button>
    </form>
@endsection
@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#discription' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush