
<div class="container mt-5">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-5 my-4 border-top border-1 border-dark">
    <p class="col-md-4 mb-0 text-muted">&copy; 2024 AttoZetta WebSolutions</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
  <h5 class="font-logo ">pResto.it</h5>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="{{ route('home')}}" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="{{ route('product') }}" class="nav-link px-2 text-muted">{{__('ui.annunci')}}</a></li>
      <li class="nav-item"><a href="{{ route('register') }}" class="nav-link px-2 text-muted">{{__('ui.registrati')}}</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About us</a></li>
    </ul>
  </footer>
</div>