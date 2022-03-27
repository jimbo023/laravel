@extends('layouts.main')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Сделать заказ</h1>
</div>
<br>
<div class="form-feedback" style="width: 100%; display: flex; justify-content: center">
    <form method="post" action="{{ route('order.store') }}">
        @csrf

        <div class="form-group">
            <label for="exampleFormControlInput1">Имя заказчика</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ivanov Ivan" required="required">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Номер телефона</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="7900123123" required="required" pattern="([\+]*[7-8]{1}\s?[\(]*9[0-9]{2}[\)]*\s?\d{3}[-]*\d{2}[-]*\d{2})">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required="required">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Введите заказ</label>
            <textarea class="form-control" id="discription" name="discription" rows="3" required="required"></textarea>
        </div>
        <br />
        <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Отправить</button>
    </form>
</div>
@endsection