@extends('layouts.main')

@section('content')
@foreach ($categoryList as $category)
<div class="col">
    <div class="card shadow-sm">
        <img src="https://media-cldnry.s-nbcnews.com/image/upload/newscms/2019_01/2705191/nbc-social-default.png"
            alt="null">
        <div class="card-body">
            <p class="card-text">
                {{ $category }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('news', ['category' => "$category"]) }}">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Посмотреть</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection