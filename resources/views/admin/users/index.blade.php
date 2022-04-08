@extends('layouts.admin')

@section('content');
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.category.create') }}"> Create New Vendor</a>
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
            <th>Name</th>
            <th>Phone</th>
            <th>Type</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>
                @switch($user->type)
                    @case(0)
                        Owner
                    @break
 
                    @case(1)
                        Vendor
                    @break
                     
                    @case(2)
                        Customer
                    @break
 
                @default
                    Why And How...
                @endswitch
            </td>
            <td>
            @switch($user->status)
                    @case(0)
                        In Active
                    @break
 
                    @case(1)
                        Active
                    @break
                @default
                    Why And How...
                @endswitch
            </td>
            <td>
                <form action="{{ route('admin.category.delete',$user->id) }}" method="POST">
     

      
                    <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')                   
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection