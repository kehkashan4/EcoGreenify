@extends('admin.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Eco-Friendly Places List</h2>
        <a href="{{ route('admin.marker.create')}}" class="btn" style="background-color: #39b54a; color: white;">Create New Place</a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


   <div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                  <th style="text-transform: none; background-color: #023d54; color: white;">ID</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Latitude</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Longitude</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Place</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Address</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Circle Radius</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Image</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Description</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($markers as $marker)
               <tr>
                  <td>{{ $marker->id }}</td>
                  <td>{{ $marker->latitude }}</td>
                  <td>{{ $marker->longitude }}</td>
                  <td>{{ $marker->place_name }}</td>
                  <td>{{ $marker->address }}</td>
                  <td>{{ $marker->circle_radius }}</td>
                  <td><img src="{{ $marker-> image}}" style="width: 100px; height: 70px; object-fit: cover;"></td>
                  <td>{!! $marker->description !!}</td>

                  <td>
                       @if(isset($marker->slug))
                           <a class="btn btn-primary mt-1" href="{{ route('admin.marker.edit',['slug'=>$marker->slug])}}"><i class="fas fa-edit"></i></a>
                       @endif
                          <a class="btn btn-danger mt-1" href="{{ route('admin.marker.delete',['id'=>$marker->id])}}"><i class="fas fa-trash-alt"></a></td>

                  </td>
               </tr>
           @endforeach
        </tbody>
    </table>
   </div>

   <div> {{ $markers->links('pagination::bootstrap-5') }}</div>
</div>

@endsection
