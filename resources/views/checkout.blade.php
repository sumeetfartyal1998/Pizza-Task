<!doctype html>
<html lang="en">
  <head>
    @include('include.head')
    <title>Checkout</title>
  </head>
  <body>
    @include('include.mainnav')
    <main class="container">
        <h1 class="mt-3">Checkout</h1>
        <form action="{{url('checkout')}}" method="post">
            @csrf()
            <br>
            <div class="form-group">
                <label>Credit Card Details</label>
                <input type="text" name="cred" class="form-control">
                @if ($errors->has('cred'))
                <label class="alert alert-danger">{{$errors->first('cred')}}</label>
                @endif
            </div>
            <p><b>Order Total:</b> {{$total}}</p>
            <button type="submit" name="sub" class="btn btn-dark">Checkout</button>
        </form>
    </main>
    @include('include.foot')
  </body>
</html>