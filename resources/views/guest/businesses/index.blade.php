@extends('app')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <ul class="list-group">
            @foreach ($businesses as $business)
            <li class="list-group-item">
            {!! Button::normal($business->name)->asLinkTo( route('user.businesses.home', ['business' => $business]) ) !!} {{ str_limit($business->description, 50) }}
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
