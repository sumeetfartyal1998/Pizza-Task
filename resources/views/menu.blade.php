<!doctype html>
<html lang="en">
  <head>
    @include('include.head')
    <title>Menu</title>
  </head>
  <body>
    @include('include.mainnav')
    <main>
    <div class="container my-2">
        <h1>Menu</h1>
        <div class="row">
            @foreach ($items as $menu) 
            <div class="col-sm-4 mt-4"> 
                <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{URL::asset('/menu_items/'.$menu->img)}}" alt="Card image cap" height="200px">
                <div class="card-body">
                    <h5 class="card-title ">{{$menu->item}}</h5>
                    <p class="card-text ">₹{{$menu->price}}</p>
                    <form action="/addtocart" method="post">
                      @csrf()
                      <input type="hidden" value="{{$menu->id}}" name="item_id">
                      <button class="btn btn-primary">Add to cart</button>
                    </form>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    </main>
    @include('include.foot')
  </body>
</html>