<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')
    <title>Login</title>
    
</head>
<body class="container">
    @include('include.nav')
    <h1 >Login</h1>
    <section>
    @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success')}} </div>
        @endif
        @if(Session::has('errMsg'))
            <div class="alert alert-danger"> {{Session::get('errMsg')}} </div>
        @endif

        <form method="post" action="">
            @csrf()
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="User Email ">
            </div>
            @if ($errors->has('email'))
                <label class="alert alert-danger">{{$errors->first('email')}}</label>
            @endif

            <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="User Password ">
            </div>
            @if ($errors->has('pass'))
                <label class="alert alert-danger">{{$errors->first('pass')}}</label>
            @endif

            <div class="col-12 form-group">
                <button class="btn btn-success p-2" type="submit" name="sub">Login</button>
            </div>

        </form>
    </section>
    @include('include.foot')
</body>
</html>