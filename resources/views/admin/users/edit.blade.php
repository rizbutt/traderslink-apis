@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update',$users->id) }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $users->phone }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="parent_id" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                            
                            <select class="form-select" id="status" name="status" aria-label="Default select example">
                                <option selected>Select Status</option>
                                <option value="1" @if ($users->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($users->status == 0) selected @endif>In Active</option>
                                
                            </select>
                            </div>
                        </div>
                        
                        @if ($users->type == 'vendor')
                        <div  id="vencity">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-6">
                            <select class="form-select" name="city" aria-label="Default select">
                                <option selected>Select Your City</option>
                                <option value="1" @if ($users->city == 'Karachi') selected @endif>Karachi</option>
                                <option value="2" @if ($users->city == 'Lahore') selected @endif>Lahore</option>
                                <option value="3" @if ($users->city == 'Islamabad') selected @endif>Islamabad</option>
                            </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $users->address }}" required autocomplete="address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="shop_number" class="col-md-4 col-form-label text-md-end">{{ __('Shop Number') }}</label>

                            <div class="col-md-6">
                            <input id="shop_number" type="text" class="form-control @error('address') is-invalid @enderror" name="shop_number" value="{{ $users->shop_number }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="shop_number" class="col-md-4 col-form-label text-md-end">{{ __('Deal In') }}</label>

                            <div class="col-md-6">
                            <select class="form-select" name="dealin" aria-label="Default select">
                                <option selected>Select Your Category</option>
                                <option value="0" @if ($users->dealin == 0) selected @endif>Main Category</option>
                                @foreach ($cat_list as $cat)
                                <option value="{{ $cat->id }}" @if ($users->dealin == $cat->id) selected @endif >{{ $cat->name }}</option>
                                    {{ $cat->name }}
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    @endif
                        <div id="vendorimages"></div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
