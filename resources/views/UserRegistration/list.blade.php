<link rel="stylesheet" href="{{ asset('../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('../../plugins/daterangepicker/daterangepicker.css') }}"> --}}
@extends('admin.app')
@section('content')

@include('Messages.message')


<section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            {{-- <form action="{{Route('registration.index')}}" method="GET">
                                By Name : <input type="text" name="name"></input>
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <form action="{{Route('registration.index')}}" method="GET">
                                By Email : <input type="text" name="email"></input>
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <form action="{{Route('registration.index')}}" method="GET">
                                By Phone : <input type="text" name="phone"></input>
                                <button type="submit"><span class="fas fa-search"></span></button>
                            </form> --}}
                            <form action="{{route('registration.search')}}" method="POST">
                                @csrf

                                <div class="form-row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search by name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                            <input type="text" class="form-control" placeholder="Search by phone" name="phone">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                            <input type="text" class="form-control" placeholder="Search by email" name="email">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                            <input class="reservation form-control"  type="text" name="from" placeholder="From date" readonly>
                                        </div>
                                    </div> -to-

                                    <div class="col-md-2">
                                        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                            <input class="reservation form-control" type="text" name="to" placeholder="To date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                            <button class="form-control" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>



                                {{--  <input type="text"  placeholder="Search by name" name="name">
                                <input type="text"  placeholder="Search by phone" name="phone">
                                <input type="text"  placeholder="Search by email" name="email">

                                <input class="reservation" type="text" name="from" placeholder="From date" readonly> -to- <input class="reservation" type="text" name="to" placeholder="To date" readonly>

                                <button type="submit">Search</button>  --}}
                            </form>
                        </div>
                    </div>

                </div>

                {{-- <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="{{Route('registration.index')}}" method="GET">
                                By Date: From : <input type="text" name="from" class="reservation" readonly></input> -To- <input class="reservation" type="text" name="to" readonly></input>
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div> --}}

                <h3 class="card-title">List of all pages</h3>




            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: relative;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr role="row">
                        <td>Sl. No</td>
                        <td>Change</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($user_registration_data as $key => $user_registration_data)

                        <tr>
                            <td>{{$key+1}}</td>
                            <td>

                                <a class="btn btn-primary alert-danger fas fa-trash-alt" onclick="return confirm('Are you sure?')" href="{{Route('deleteuser',$user_registration_data->id)}}"></a>

                                {{-- <form action="/registration/{{$user_registration_data->id}}" method="post" >
                                    @csrf
                                    {{method_field('delete')}}
                                    <button class="btn btn-primary alert-danger fas fa-trash-alt" onclick="return confirm('Are you sure?')" type="submit"></button> --}}


                                    <a class="btn btn-primary alert-success fas fa-edit" href="{{Route('registration.edit',$user_registration_data->id)}}"></a>
                                    <a href="{{ route('send.pdf',$user_registration_data->id) }}" class="btn btn-info fas fa-envelope"></a>
                                {{-- </form> --}}

                            </td>
                            <td><a href="registration/{{$user_registration_data->id}}">{{$user_registration_data->name}}</a></td>
                            <td>{{$user_registration_data->email}}</td>
                            <td>{{$user_registration_data->phone}}</td>
                            <td><img src="{{  asset('/Photos/Users/'.$user_registration_data->photo)  }}" height="100px" width="100px"></td>

                        </tr>

                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>

@endsection

@section('jsscript')
<script src="{{ asset('../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".reservation").datepicker({
            format: 'yyyy-mm-dd'
        });
        });
</script>

@endsection
