@extends('layouts.admin')

@section('content');
        <div class="container">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn white-bg mouse-dir" href="{{ route('admin.category.create') }}"> Create New Category</a>
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
            <th>Icon</th>
            <th>Name</th>
            <th>slug</th>
            <th>Parent Category</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            
            <td><i class="{{ $category->image }}"></i></td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->parent_id }}</td>
            <td>
                <form action="{{ route('admin.category.delete',$category->id) }}" method="POST">
      
                    <a class="btn btn-primary" href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')                   
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection