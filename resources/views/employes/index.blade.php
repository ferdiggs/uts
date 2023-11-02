@extends('employes.template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 10 CRUD Example</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('employes.create') }}"> Create New Product</a>
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
        <th>Name</th>
        <th>KTP</th>
        <th>Address</th>
        <th>Phone</th>
        <th>birth</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($employes as $employe)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $employe->name }}</td>
        <td>{{ $employe->ktp }}</td>
        <td>{{ $employe->address }}</td>
        <td>{{ $employe->phone }}</td>
        <td>{{ $employe->birth }}</td>
        <td>
            <form action="{{ route('employes.destroy',$employe->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('employes.show',$employe->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('employes.edit',$employe->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $employes->links() !!}

@endsection