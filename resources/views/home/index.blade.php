



@extends('User.app')


@section('title')
{{$setting->web_title}}
@endsection

@section('logo')
    <img class="mob" width="100px" src="{{  asset('/Photos/Logo/'.$setting->logo)  }}">
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

@section('copyright')
    {!!$setting->copy_rights!!}
@endsection

    


@section('content')

    @if(session()->has('message'))

    <div class="row d-flex justify-content-center">
        <div class="menu-content pb-40 col-lg-8">
            <div class="title text-center">

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aira-hidden="true">
                        x
                    </button>
                    <strong>{!! session()->get('message') !!}</strong>
                </div>

            </div>
        </div>
    </div>

    @endif

<section class="default-banner active-blog-slider">


    @foreach($slider as $slider)

    <div class="item-slider relative" style="background: url('Photos/Slider/{{$slider->photo}}');background-size: cover;">
        <div class="overlay" style="background: rgba(0,0,0,.3)"></div>
        <div class="container">
            <div class="row fullscreen justify-content-center align-items-center">
                <div class="col-md-10 col-12">
                    <div class="banner-content text-center">
                        <h1 class="text-uppercase text-white">{{$slider->title}}</h1>
                        <p class="text-white">{!!$slider->description!!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @endforeach


</section>





    <div class="container">

        @foreach ($message as $message)
        <br><br>

                <div class="row ">
                    <div class="col-lg-4">
                        <div class="title text-center">
                            <h2>{{$message->title}}</h2><br>
                            <img style="width:100%" src="{{  asset('/Photos/Messenger/'.$message->photo) }}">
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div>
                            <p style="text-align:justify;">{!! $message->message !!}</p>
                        </div>
                    </div>

                </div>
        @endforeach

        <br><br>

        <div class="row ">
            <div class="col-lg-8">
                <div >
                    <h2 style="text-align:center">Homemopathy Events</h2><br>
                    <img style="width:100%" src="{{  asset('/Photos/Photos_Under_Messages/Homeo-Schedule.png') }}">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="contain">
                    <img  src="{{  asset('Photos/logo_and_header_image/side.jpg')  }}" height="750px" width="100%" class="imgr imgt">
                    <div class="centered"><h3><a href="{{route('home.register')}}"><font color="Yellow">Register Now</font></a></h3></div>
                </div>
            </div>




        </div>

            {{-- <div class="row ">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <h3 style="text-align:center">Homemopathy Events</h3><br>
                    <img style="width:100%" src="{{  asset('/Photos/Photos_Under_Messages/Homeo-Schedule.png') }}"
                </div>
            </div> --}}

    </div>
    <br><br>








    {{-- <div class="container">
        @foreach ($notice as $notice)

                <div class="row ">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                        <div class="title text-center">
                            <h2>{{$notice->title}}</h2><br>
                            <img style="width:100%" src="{{  asset('/Photos/Notice/'.$notice->photo) }}" width="50%">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div><br><br>
                            <p>{!! $notice->description !!}</p>
                        </div>
                    </div>

                </div>

                <div class="row ">
                    <div class="col-lg-12">
                        <div><br><br>
                            <p>{!! $notice->description !!}</p>
                        </div>
                    </div>

                </div>
        @endforeach

    </div> --}}

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





