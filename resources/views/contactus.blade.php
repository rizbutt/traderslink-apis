@extends('layouts.app')

@section('content')
<div class="container">
<h3 class="text-center">Contact us</h3><br />

<div class="row">
  <div class="col-md-8">
      <form action="/post" method="post">
        <input class="form-control" name="name" placeholder="Name..." /><br />
        <input class="form-control" name="phone" placeholder="Phone..." /><br />
        <input class="form-control" name="email" placeholder="E-mail..." /><br />
        <textarea class="form-control" name="text" placeholder="How can we help you?" style="height:150px;"></textarea><br />
        <input class="btn btn-primary" type="submit" value="Send" /><br /><br />
      </form>
  </div>
  <div class="col-md-4">
    <b>Customer service:</b> <br />
    Phone: +1 129 209 291<br />
    E-mail: <a href="mailto:support@mysite.com">support@mysite.com</a><br />
    <br /><br />
    <b>Headquarter:</b><br />
    Company Inc, <br />
    Las vegas street 201<br />
    55001 Nevada, USA<br />
    Phone: +1 145 000 101<br />
    <a href="mailto:usa@mysite.com">usa@mysite.com</a><br />



  </div>
</div>

</div>
@endsection