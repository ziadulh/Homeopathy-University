

@extends('User.app')

    {{-- <style>
    img.sticky {
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      width: 200px;
    }
    </style> --}}

@section('title')
{{$setting->web_title}}
@endsection

@section('logo')
    <img class="mob" width="100px" src="{{  asset('/Photos/Logo/'.$setting->logo)  }}">
@endsection

@section('copyright')
    {!!$setting->copy_rights!!}
@endsection

@section('fb')
{{$setting->fb}}
@endsection

@section('tw')
{{$setting->tw}}
@endsection

@section('in')
{{$setting->ins}}
@endsection


@section('content')

</head>

<div class="contain">

   @if ($page->slug == 'about-us')

   <img height="250px" src="{{  asset('Photos/logo_and_header_image/shutterstock_26801899_result.jpg')  }}" alt="Snow" style="width:100%;">
    <div class="centered"><h1>{{$page->title}}</h1></div>

   @else

   <img height="250px" src="{{  asset('Photos/logo_and_header_image/shutterstock_26871142_result.jpg')  }}" alt="Snow" style="width:100%;">
    <div class="centered"><h1>{{$page->title}}</h1></div>

   @endif

</div>



<section class="about-generic-area pb-100">
    <div class="container border-top-generic"><br><br>
        <div class="row">

            <div class="col-md-6">
                <h3 class="about-title mb-30">Address</h3>
                    @if ($page->slug == 'about-us')
                    {!! $page->description !!}
                    @else
                    {!! $setting->address !!}
                        Phone : {{$setting->phone}}<br><br>
                        {{-- {!! $page->third_party_code !!} --}}

                    @endif

                </div>

            <div class="col-md-6">
                {!! $page->third_party_code !!}
            </div>
        </div><br><br>

        @if ($page->slug == 'about-us')

            <div class="row">

                <div class="col-md-12">
                    <img style="width:100%" src="{{  asset('/Photos/Photos_at_AboutUS_Page/Tk-Leflet-2020.......777777.gif') }}">
                </div>
            </div>

        @endif

    </div>
</section>

@endsection

@section('jsscript')

<style>
    @media (max-width: 991px){
        .mob {

            width: 55px;
        }
    }

    @media (max-width: 991px){
        .imgr {

            height: 400px;
        }
    }

    @media (max-width: 450px){
        .imgt {

            height: 200px;
        }
    }


    .contain {
    position: relative;
    text-align: center;
    color: black;
    }


    .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
</style>
    
@endsection
