



@extends('User.app')
<link rel="stylesheet" type="text/css" href="{{ asset('fancy_box/dist/jquery.fancybox.min.css') }}">

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


    <style>

    @media (max-width: 991px){
            .mob {
    
                width: 55px;
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
    </head>

    <div class="contain">
        <img height="250px" src="{{  asset('Photos/logo_and_header_image/shutterstock_26871142_result.jpg')  }}" alt="Snow" style="width:100%;">
        <div class="centered"><h1>Photos</h1></div><br>
    </div>


    {{-- <div class="container" style="padding-bottom: 25px;">
        <div class="row">
            @foreach ($photo as $photo)
                <div class="col-sm-4">
                    <div style="width:350px;height:220px;background-color:liquid;border-style: solid;
                    border-color: #92a8d1; "> --}}
                        {{-- <a href="{{URL::to('photo-photo/'.$photo->id)}}">
                            <img width="330px" height="200px" src="{{asset('/Photos/Album/'.$photo->photo)}}">
                        </a> --}}
                        {{-- <img width="330px" height="200px" src="{{asset('/Photos/Photos/'.$photo->photo)}}">

                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

    <div class="container">

        <div class="title text-center" style="padding-bottom: 25px;"><br>
            <h3>Photos</h3>
        </div>

        <div class="row">
            @foreach($photo as $photo)

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                    <a href="{{ asset('Photos/Photos/'.$photo->photo) }}" data-fancybox="gallery" data-caption="{{$photo->description}}">
                        <img src="{{asset('/Photos/Photos/'.$photo->photo)}}" alt="" height="200px" width="100%" />
                    </a>

                    <div class="card-body">
                        <p class="card-text">{!!$photo->description!!}</p>
                        {{-- <div class="d-flex justify-content-between align-items-center">
                            @if (auth()->check())

                            <div class="btn-group">
                                <div style="float: left;">
                                    <form action="{{route('photo.destroy',$photo->id)}}" method="post" >
                                        @csrf
                                        {{method_field('delete')}}
                                        <button class="btn btn-sm btn-outline-secondary" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                                    </form>

                                </div>

                                <div style="float: right;">
                                    <a class="btn btn-sm btn-outline-secondary" href="{{route('photo.edit',$photo->id)}}">Edit</a>

                                </div>


                            </div>

                            @endif

                        </div> --}}
                    </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>


@endsection

@section('jsscript')

    <script src="{{asset('fancy_box/dist/jquery.fancybox.min.js')}}"></script>

@endsection

