<!doctype html>
<html lang="en">
  <head>
    @include('include.head')
    <title>Cart</title>
  </head>
  <body>
    @include('include.mainnav')
    
    <main class="container">
      <h1>Shopping Cart</h1>
      <hr>
        @php
        $total=0;
        @endphp
        @foreach($items as $item)
        @php
        $price=$item->price*$item->quantity;
        $total=$total+$price;
        @endphp
        <div class="row ml-2">
            <div class="col-2">
                <img src="{{asset('/menu_items/'.$item->img)}}" width="100%" alt="">
            </div>
            <div class="col-3">
              <h5>{{$item->item}}</h5>
            </div>
            <div class="col-1">
              <h6>₹{{$item->price}}</h6>
            </div>
            <div class="col-4">
              <input type="text" value="{{$item->quantity}}">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-dark">Delete</button>
            </div>
        </div>
        <hr>
        @endforeach
        <div class="row d-flex justify-content-right text-right ">
          <h5 class="col-6 ">₹{{$total}}</h5>
          <div class="col-5">
            <a href="/checkout/{{$total}}"><button type="button" class="btn btn-dark">Checkout></button></a>
          </div>
        </div>
    </main>
    @include('include.foot')
  </body>
</html>