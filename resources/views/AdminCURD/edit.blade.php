
@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Update Information</h3>
                    </div>

                    <form role="form" action="{{route('adminCURD.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name"><font color="red">*</font>Full Name & Title (For Certificate)</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
                            </div>

                            <div class="form-group">
                                <label for="email"><font color="red">*</font>Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{$data->email}}">
                            </div>

                            {{method_field('PUT')}}

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection



