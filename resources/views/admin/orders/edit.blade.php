@extends('layouts.admin')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Редактировать заказ</h1>
</div>
<br>
@include('inc.messages')
<form method="post" action="{{ route('admin.orders.update', ["order" => $order] ) }}">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="name">Имя заказчика</label>
        <input type="text" class="form-control" id="name" name="name" required="required" value="{{$order->name}}">
    </div>
    <div class="form-group">
        <label for="phone">Телефон</label>
        <input type="text" class="form-control" id="phone" name="phone" required="required" value="{{$order->phone}}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" required="required" value="{{$order->email}}">
    </div>
    <div class="form-group">
        <label for="discription">Описание</label>
        <input type="text" class="form-control" id="discription" name="discription" value="{{$order->discription}}">
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select name="status" id="status" class="form-control" required="required">
            <option value="done" @if($order->status === old('status')) selected @endif>done</option>
            <option value="work" @if($order->status === old('status')) selected @endif>work</option>
        </select>
      </div>
    <br />
    <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Сохранить</button>
</form>
@endsection