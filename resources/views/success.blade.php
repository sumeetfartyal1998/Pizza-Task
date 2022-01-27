<!doctype html>
<html lang="en">
  <head>
    @include('include.head')
    <title>Checkout</title>
  </head>
  <body>
    @include('include.mainnav')
    <main class="container">
        <h1 class="mt-3">Order has been placed successfully!</h1>
        <div class="alert alert-success" role="alert">
            You will receive notification by email with order details.
        </div>
        <a href="/menu"><button type="button" class="btn btn-dark">Go and order some more</button></a>
    </main>
    @include('include.foot')
  </body>
</html>