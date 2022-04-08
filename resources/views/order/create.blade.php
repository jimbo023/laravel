@extends('layouts.main')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Сделать заказ</h1>
</div>
@include('inc.messages')
<br>
<div class="form-feedback" style="width: 100%; display: flex; justify-content: center">
    <form method="post" action="{{ route('order.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Имя заказчика</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ivanov Ivan" value='{{ old('name') }}'>
        </div>
        <div class="form-group">
            <label for="phone">Номер телефона</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="7900123123"  value='{{ old('phone') }}'>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"  value='{{ old('email') }}'>
        </div>
        <div class="form-group">
            <label for="discription">Введите заказ</label>
            <textarea class="form-control" id="discription" name="discription" rows="5">{{ old('discription') }}</textarea>
        </div>
        <br />
        <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Отправить</button>
    </form>
</div>
@endsection