
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


    
    </head>

    <div class="contain">
        <img height="250px" src="{{  asset('Photos/logo_and_header_image/shutterstock_26871142_result.jpg')  }}" alt="Snow" style="width:100%;">
        <div class="centered"><h1>Gallery</h1></div>
    </div>







    {{-- <div class="container" style="padding-bottom: 25px;">
        <div class="row">
            @foreach ($gallery as $gallery)
                <div class="col-sm-4">
                    <div style="width:350px;height:220px;background-color:liquid;border-style: solid;
                    border-color: #92a8d1; ">
                        <a href="{{URL::to('photo-gallery/'.$gallery->id)}}">
                            <img width="330px" height="200px" src="{{asset('/Photos/Album/'.$gallery->photo)}}">
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}


    <div class="container">

        <div class="title text-center" style="padding-bottom: 25px;"><br>
            <h3>Albums</h3>
        </div>

        <div class="row">
          @foreach($gallery as $gallery)

          <div class="col-md-4">
            <div class="card mb-2 shadow-sm">
            <img src="{{asset('/Photos/Album/'.$gallery->photo)}}" alt="" height="200px">
              <div class="card-body">
                <p class="card-text">{!! $gallery->description !!}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{URL::to('photo-gallery/'.$gallery->id)}}" class="btn btn-sm btn-outline-secondary">View</a>

                  </div>
                  <small class="text-muted">{{$gallery->title}}</small>
                </div>
              </div>
            </div>
          </div>
          @endforeach
    </div>
</div>


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
