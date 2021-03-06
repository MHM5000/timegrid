@extends('app')

@section('content')
<div class="container">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">{{ trans('manager.businesses.index.title') }}</div>

                <div class="panel-body">
                    @if($user->hasBusiness())
                        {!! Alert::info(trans('manager.businesses.index.help')) !!}
                            
                        @foreach ($businesses as $business)
                            <div class="row">
                            <div class="col-md-12">
                                <div class="media">
                                  <div class="media-left media-top hidden-xs hidden-sm">
                                    <a href="{{route('manager.business.show', ['business' => $business])}}">{!! $business->facebookImg('normal') !!}</a>
                                  </div>
                                  <div class="media-body">
                                    <blockquote>{!! Button::normal($business->name)->asLinkTo( route('manager.business.show', ['business' => $business]) ) !!} {{ str_limit($business->description, 50) }}</blockquote>
                                  </div>
                                </div>
                            </div>
                            </div>
                        @endforeach

                    @else
                        {!! Alert::info(trans('manager.businesses.index.register_business_help')) !!}
                        <div class="text-center">{!! Button::success(trans('user.businesses.index.btn.power_create'))->withIcon(Icon::ok())->large()->asLinkTo( route('manager.business.register') ) !!}</div>
                    @endif
                </div>

                <div class="panel-footer">
                    {!! Button::normal(trans('app.nav.manager.business.register'))->asLinkTo( route('manager.business.register') ) !!}
                </div>
            </div>
        </div>

</div>
@endsection

@if(!$user->hasBusiness())
    @section('footer_scripts')
    @parent
    {!! TidioChat::js() !!}
    @endsection
@endif