@extends('admin.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Favorite List</h2>
    </div>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                  <th style="text-transform: none; background-color: #023d54; color: white;">ID</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">User Name</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Place Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach($favorites as $favorite)
               <tr>
                  <td>{{ $favorite->id }}</td>
                  <td>{{ $favorite->user->name }}</td>
                  <td>{{ $favorite->marker->place_name }}</td>
               </tr>
           @endforeach
        </tbody>
    </table>
</div>

@endsection
