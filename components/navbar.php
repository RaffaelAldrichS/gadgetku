<nav class="navbar navbar-expand-lg nav-underline">
  <div class="container d-flex">
    <a class="navbar-brand fs-3 fw-bold text-hitam" href="index.php">Gadget<span class="text-hijau">Ku</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
        <li class="nav-item">
          <a class="nav-link fs-5 fw-medium text-hitam" aria-current="page" href="index.php?target=homepage">Home</a>
        </li>
        <li class="nav-item dropdown">
          <button class="nav-link fs-5 fw-medium text-hitam dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?target=products">Show Products</a></li>
            <li><a class="dropdown-item" href="index.php?target=addProducts">Add Products</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 fw-medium text-hitam" href="index.php?target=support">Support</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2 rounded-4" type="search" placeholder="Search Product..." aria-label="Search" />
        <button class="btn btn-outline-success d-none" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>