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
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $key => $data)

                        <tr>
                            <td>{{$key+1}}</td>
                            <td>

                                <form action="{{route('adminCURD.destroy',$data->id)}}" method="post" >
                                    @csrf
                                    {{method_field('delete')}}
                                    <button class="btn btn-primary alert-danger fas fa-trash-alt" onclick="return confirm('Are you sure?')" type="submit"></button>
                                    <a class="btn btn-primary alert-success fas fa-edit" href="{{route('adminCURD.edit',$data->id)}}"><spam></spam></a>
                                </form>

                            </td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
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
