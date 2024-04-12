<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>
<body>
    @extends('layouts.layout')
    @section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <h3 class="card-header text-center">Update User</h3>   
                <div class="card-body">
                    <form action="/users/update/{{$user->id}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Name" id="name" class="form-control" name="name"  value="{{$user->name}}"
                                required autofocus>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Email" id="email_address" class="form-control"
                                name="email"  value="{{$user->email}}" disabled required autofocus>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control"
                                name="password" required>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Confirm Password" id="confirm-password" class="form-control"
                                name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>