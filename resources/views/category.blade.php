@extends('layouts.app')

@section('content')
    <section class="services section">
        <div class="container">
            <div class="row">
                @foreach($childcategory as $category)
                <div class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('findparts', $category->slug ) }}">
                    <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                        <div class="serial">
                            <span><i class="{{ $category->image }}"></i></span>
                        </div>
                        
                        <h3><a href="{{ route('findparts', $category->slug ) }}">{{ $category->name }}</a></h3>
                    </div>
                </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
@endsection

    </body>
</html>