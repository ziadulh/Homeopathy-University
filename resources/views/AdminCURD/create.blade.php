
@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Registration Form</h3>
                    </div>

                    <form role="form" action="{{route('adminCURD.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{old ('name')}}" class="form-control" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" value="{{old ('email')}}" class="form-control" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" value="{{old ('password')}}" class="form-control" name="password" id="password">
                            </div>

                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" value="{{old ('confirm-password')}}" class="form-control" name="confirm-password" id="confirm-password">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection


