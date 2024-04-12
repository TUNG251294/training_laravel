<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete User</title>
</head>
<body>
    @extends('layouts.layout')
    @section('content')
        <h2>Sure you want to delete user {{$user->name}}?</h2>
    <form action="/users/delete/{{$user->id}}" method="post">
        @csrf
        <button type="submit">Delete user</button>
    </form>
    <a href="/users">Return home page</a>
    @endsection
</body>
</html>