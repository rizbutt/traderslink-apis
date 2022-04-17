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

                            <div class="col-md-6">
                             
                            <select class="form-select" id="image" name="image">
                                
                                <option value="0" @if ($category->image == 0) selected @endif> Main Category  </option>
                                <option value="fa fa-gears" @if ($category->image == 'fa fa-gears') selected @endif> &#xf085; Gears  </option>
                                <option value="fas fa-binoculars" @if ($category->image == 'fas fa-binoculars') selected @endif> &#xf1e5; Binoculars</option>
                                <option value="fa-solid fa-car" @if ($category->image == 'fa-solid fa-car') selected @endif> &#xf1b9; Car</option>
                                <option value="fas fa-car-battery" @if ($category->image == 'fas fa-car-battery') selected @endif> &#xf5df; Battery</option>
                                <option value="fas fa-car-crash" @if ($category->image == 'fas fa-car-crash') selected @endif> &#xf5e1; Car Crash</option>
                                <option value="fas fa-compass" @if ($category->image == 'fas fa-compass') selected @endif> &#xf14e; Compass</option>
                                <option value="fas fa-cubes" @if ($category->image == 'fas fa-cubes') selected @endif> &#xf1b3; Cubes</option>
                                <option value="fas fa-fire-extinguisher" @if ($category->image == 'fas fa-fire-extinguisher') selected @endif> &#xf134; Extinguisher</option>
                                <option value="fas fa-location-arrow" @if ($category->image == 'fas fa-location-arrow') selected @endif> &#xf124; Arrow</option>
                                <option value="fas fa-recycle" @if ($category->image == 'fas fa-recycle') selected @endif> &#xf1b8; Recycle Arrows</option>
                                <option value="fas fa-rocket" @if ($category->image == 'fas fa-rocket') selected @endif> &#xf135; Rocket</option>f05b
                                <option value="fas fa-road" @if ($category->image == 'fas fa-road') selected @endif> &#xf018; Road</option>
                                <option value="fas fa-crosshairs" @if ($category->image == 'fas fa-crosshairs') selected @endif> &#xf05b; Crosshairs</option>
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