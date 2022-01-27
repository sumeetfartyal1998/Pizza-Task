<!doctype html>
<html lang="en">
  <head>
    @include('include.head')
  </head>
  <body class="container">
    @include('include.nav')

    <main class="jumbotron" style="font-size: 27px;">
        <h1 style="font-size: 70px;font-weight:normal">Pizza Delivery</h1>
        <p>Welcome to pizza delivery service. This is the place when you may chose the most delicious pizza you like from wide variety of options!</p>
        <hr class="my-4">
        <b>We're performing delivery free of charge in case if your order is higher than 20$</b>
        <button type="button" class="btn btn-dark mt-4" style="width: 100%;font-size:20px">Sign in and Order</button>
    </main>

    @include('include.foot')
  </body>
</html>