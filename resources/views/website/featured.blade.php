@extends('layouts.website')

@section('content')
    

    


    <div class="services-wrapper bg-white py-5">
        <div class="container">
          <div class="row">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active font-weight-bold" aria-current="page">{{__('Featured')}}</li>
              </ol>
        </div>
        <p style="font-weight: 800;font-size:1.3rem; color:#241332" class="pb-0 mb-3">{{__('Featured')}}
        </p>
            <div class="row">
           @if($providers->count() != 0)
                @foreach ($providers as $provider)
                <div class="col-md-3">
                    <a href="{{route('provider_profile',$provider->slug)}}">
                        <div class="freelancer">
                            <div>
                                <div class="top-right p-1 text-center">
                                    <span class="fa fa-heart-o"></span>
                                </div>
                                @if($provider->services()->exists())
                                <div class="bottom-left p-1">
                                    <span>{{$provider->services->first()->price}} USD</span> <i class="fa fa-video-camera"></i>
        
                                </div>
                                @endif
                                <img src="{{asset($provider->user->avatar)}}">
                            </div>
    
                            <div class="freelancer-footer">
    
                                <h5 style="padding: 0px;">{{$provider->user->name}}
                                    <span style="font-size: 12px">{{ucfirst(strtolower(_ti($provider->ProviderType->name)))}}
                                        <br>
                                        {{ucfirst(strtolower(_ti($provider->Country->name)))}}</span>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
              @endif
            </div>
        </div>
    </div>



    
    @endsection
