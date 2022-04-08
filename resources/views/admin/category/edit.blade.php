@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Edit Category') }}</div>
            <div class="card-body">
                    <form method="POST" action="{{ route('admin.category.update',$category->id) }}">
                    @csrf
                    @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slug" class="col-md-4 col-form-label text-md-end">{{ __('slug') }}</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ $category->slug }}" required >

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="parent_id" class="col-md-4 col-form-label text-md-end">{{ __('Parent Category') }}</label>

                            <div class="col-md-6">
                            
                            <select class="form-select" id="parent_id" name="parent_id">
                            @if ($category->parent_id == 0)
                            <option value="0" selected >Main Category</option>
                            @else
                            <option value="0">Main Category</option>  
                            @endif
                                @foreach ($cat_list as $cat)
                                <option value="{{ $cat->id }}" @if ($category->parent_id == $cat->id) selected @endif >{{ $cat->name }}</option>
                                    {{ $cat->name }}
                                @endforeach
                            </select>
                            @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="parent_id" class="col-md-4 col-form-label text-md-end">{{ __('Category Icon') }}</label>

                            <div class="col-md-6"> <i class="fa fa-copy"></i>
                             
                            <select class="form-select" id="image" name="image">
                                <option selected>Select category Icon</option>
                                <option value="lni lni-code"> <i class="fa fa-caret-down" aria-hidden="true"></i></option>
                                <option value="0"><i class="fa fa-gears"></i></option>
                                
                            </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="parent_id" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                            
                            <select class="form-select" id="status" name="status" aria-label="Default select example">
                                <option selected>Select Status</option>
                                <option value="1" @if ($category->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($category->status == 0) selected @endif>In Active</option>
                                
                            </select>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Category') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

    </body>
</html>