<div class="collapse bg-dark" id="navbarHeader">
  <div class="container">
    <div class="row" style="justify-content: end">
      <div class="col-sm-4 offset-md-1 py-4" style="display: flex; flex-direction: column; align-items: end">
        <h4 class="text-white">Полезное</h4>
        <ul class="list-unstyled">
          <li><a href="{{ route('order.index') }}" class="text-white">Заказать выгрузку</a></li>
          <li><a href="{{ route('feedback.index') }}" class="text-white">Оставить отзыв</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a href="{{ route('category') }}" class="navbar-brand d-flex align-items-center">
      <strong>YooNews</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</div>