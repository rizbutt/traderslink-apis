@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Add Dean In Category') }}</div>
            <div class="card-body">
                    <form method="POST" action="{{ route('admin.addcategory') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

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
                                <input id="slug" type="text" class="form-control" name="slug" value="" required >

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
                                <option selected>Select Categories</option>
                                <option value="0">Main Category</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
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

                            <div class="col-md-6"> <i class="fas fa-car-garage"></i>
                            <select class="fa form-select selectoptions" id="image" name="image">
                                <option selected>Select category Icon</option>
                                <option value="fa fa-gears"> &#xf085; Gears  </option>
                                <option value="fas fa-binoculars"> &#xf1e5; Binoculars</option>
                                <option value="fa-solid fa-car"> &#xf1b9; Car</option>
                                <option value="fas fa-car-battery"> &#xf5df; Battery</option>
                                <option value="fas fa-car-crash"> &#xf5e1; Car Crash</option>
                                <option value="fas fa-compass"> &#xf14e; Compass</option>
                                <option value="fas fa-cubes"> &#xf1b3; Cubes</option>
                                <option value="fas fa-fire-extinguisher"> &#xf134; Extinguisher</option>
                                <option value="fas fa-location-arrow"> &#xf124; Arrow</option>
                                <option value="fas fa-recycle"> &#xf1b8; Recycle Arrows</option>
                                <option value="fas fa-rocket"> &#xf135; Rocket</option>f05b
                                <option value="fas fa-road"> &#xf018; Road</option>
                                <option value="fas fa-crosshairs"> &#xf05b; Crosshairs</option>
                            </select>
                           
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="parent_id" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                            <select class="form-select" id="status" name="status" aria-label="Default select example">
                                <option selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                                
                            </select>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Category') }}
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
