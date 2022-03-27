@extends('layouts.main')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Форма обратной связи</h1>
</div>
<br>
<div class="form-feedback" style="width: 100%; display: flex; justify-content: center">
    <form method="post" action="{{ route('feedback.store') }}">
        @csrf

        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Введи отзыв</label>
            <textarea class="form-control" id="feedback" name="feedback" rows="3"></textarea>
        </div>
        <br />
        <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Отправить</button>
    </form>
</div>
@endsection