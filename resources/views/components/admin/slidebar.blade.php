<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home"></span>
            Главная
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <span data-feather="list"></span>
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.news.index') }}">
            <span data-feather="list"></span>
            Новости
          </a>
        </li>
      </ul>
    </div>
  </nav>