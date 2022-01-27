<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')
    
</head>
<body class="container">
    @include('include.nav')
    
    <h1 >Register</h1>
    <hr>
    <section >
        @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success')}} </div>
        @endif
        @if(Session::has('errMsg'))
            <div class="alert alert-success"> {{Session::get('errMsg')}} </div>
        @endif
        <form method="post" action="{{url('/register')}}">
            @csrf()
            <div class="form-group">
            <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your Name ">
            </div>
            @if ($errors->has('name'))
                <label class="alert alert-danger">{{$errors->first('name')}}</label>
            @endif

            <div class="form-group">
            <label class="form-label">Email id</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your Email id">
            </div>
            @if ($errors->has('email'))
                <label class="alert alert-danger">{{$errors->first('email')}}</label>
            @endif

            <div class="form-group">
            <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Enter a Password ">
            </div>
            @if ($errors->has('pass'))
                <label class="alert alert-danger">{{$errors->first('pass')}}</label>
            @endif

            <div class="form-group">
            <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpass" placeholder="Enter password">
            </div>
            @if ($errors->has('cpass'))
                <label class="alert alert-danger">{{$errors->first('cpass')}}</label>
            @endif

            <div class="form-group">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" name="phone" placeholder="e.g: 8087530465">
            </div>
            @if ($errors->has('phone'))
                <label class="alert alert-danger">{{$errors->first('phone')}}</label>
            @endif

            <div class="form-group">
                <label class="form-label">Street Address</label>
                <textarea class="form-control" name="address" rows="3"></textarea>
            </div>
            @if ($errors->has('address'))
                <label class="alert alert-danger">{{$errors->first('address')}}</label>
            @endif

            <div class="col-12">
                <button class="btn btn-success p-2" type="submit" name="sub">Register</button>
            </div>
        </form>
    </section>

    @include('include.foot')
</body>
</html>