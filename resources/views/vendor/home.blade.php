@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            @foreach($vendor_queries as $query)
                <p>{{ $query->content }}</p>
            @endforeach
        </div>
    </div>
</div>
    
@endsection

    </body>
</html>
