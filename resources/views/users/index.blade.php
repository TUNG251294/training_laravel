<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Users</title>
</head>
<body>
    @extends('layouts.layout')
    @section('content')
    <main class="col bg-faded py-3 flex-grow-1">
       <h2>List users</h2>
    <table class="table table-striped" style="width: 50%">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="/users/update/{{$user ->id}}">Update</a>
                <a href="/users/delete/{{$user ->id}}">Delete</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

    {{-- <button id="openModalButton">Open Modal</button> --}}
    @component('components.modal')
        @slot('title')
            Modal Title
        @endslot

        <p>Content of the modal goes here.</p>
    @endcomponent
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#openModalButton').click(function() {
                $('.modal').show(); // Hiển thị modal khi nút được nhấn
            });
        });
    </script>
    </main>
    
    @endsection
    
</body>
</html>
