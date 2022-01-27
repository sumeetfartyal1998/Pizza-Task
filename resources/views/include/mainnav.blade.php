<?php
use App\Http\Controllers\Main;
$total=Main::cartItem();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="{{asset('/logo/pizza-logo.png')}}" class="navbar-brand" alt="" style="width: 8%;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  </div>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active mr-2">
            <a class="nav-link" href="#">Menu <span class="sr-only">(current)</span></a>
        </li>
      <li class="nav-item mr-2">
        <a class="nav-link" href="/cart">Cart <b style="background-color:#696969;border-radius:5px;color:white" class="px-1">{{$total}}</b></a>
      </li>
      <li class="nav-item active mr-2">
        <a class="nav-link" href="#">Profile</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="logout"><button type="button" class="btn btn-outline-dark mr-2">Logout</button></a>        
    </form>
</nav>