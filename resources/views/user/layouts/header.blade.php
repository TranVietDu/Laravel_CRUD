<nav id="header" class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"><img class="logo" src="./assets/image/logo.png" alt=""> <b><span class="name">Classi</span>Grids</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav collapsetop me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="active" aria-current="page" href="#">Catelogies</a>
        </li>
        <li class="nav-item">
          <a class="active" aria-current="page" href="#">Listings</a>
        </li>
        <li class="nav-item">
          <a class="active" aria-current="page" href="#">Pages</a>
        </li>
        <li class="nav-item">
          <a class="active" aria-current="page" href="#">Blog</a>
        </li>
      </ul>
      @if(Auth::check())
      <form class="d-flex">
        <div class="lore">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item login">
              <a class="active" aria-current="page" href=""><i class="fas fas fa-user"><b>{{Auth::user()->name}}</b></i></a>
            </li>
            <li class="nav-item">
              <a class="active" aria-current="page" href="/logout"><i class="fas fa-user"> <b>Logout</b></i></a>
            </li>
            @if(Auth::user()->role==1)
            <li  class="nav-item">
              <a style="background-color: #5830df;padding: 10px;border-radius: 5px;color: white;" class="active" aria-current="page" href="/admin">Admin</a>
            </li>
            @endif
          </ul>
        </div>
      </form>
      @else
      <form class="d-flex">
        <div class="lore">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item login">
              <a class="active" aria-current="page" href="/login"><i class="fas fa-sign-in-alt"><b> Login</b></i></a>
            </li>
            <li class="nav-item">
              <a class="active" aria-current="page" href="/register"><i class="fas fa-user"> <b> Register</b></i></a>
            </li>
            <li class="nav-item">
              <a class="active" aria-current="page" href="#"><button class="btn">Post An Ad</button></a>
            </li>
          </ul>
        </div>
      </form>
      @endif
    </div>
  </div>
</nav>