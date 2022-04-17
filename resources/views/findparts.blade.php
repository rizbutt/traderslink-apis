@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-md-8">
      <form action="{{ route('querycreate') }}" method="post">
      @csrf
        <input class="form-control" name="sender_name" placeholder="Name..." /><br />
        <input class="form-control" name="sender_phone_number" placeholder="Phone..." /><br />
        <div class="row mb-3">
                            <label for="Type" class="col-md-4 col-form-label text-md-end">{{ __('Required Type') }}</label>
        
                            <div class="col-md-6">
                            <select class="form-select" name="type" aria-label="Default select">
                                <option value="" selected>Select Part Category</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" @if ($cat->id == $selectedcategory) selected @endif >{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
        <textarea class="form-control" name="content" placeholder="Details" style="height:150px;"></textarea><br />
        <input class="btn btn-primary" type="submit" value="Send" /><br /><br />
      </form>
  </div>
  <div class="col-md-4">

  </div>
</div>

</div>
@endsection