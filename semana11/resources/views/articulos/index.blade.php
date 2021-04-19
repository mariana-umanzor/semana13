@extends('articulos.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articulos.create') }}"> Create New articulo</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $articulo->Nombre }}</td>
            <td>{{ $articulo->detail }}</td>
            <td>
                <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('articulos.show',$articulo->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('articulos.edit',$articulo->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $articulos->links() !!}
      
@endsection