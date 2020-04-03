@extends('admin.app')
@section('content')

@include('Messages.message')

<section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h3 class="card-title">List of all pages</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: relative;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Change</th>
                    <th>ID</th>
                    <th>Web Title</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>


                        <tr>
                            <td>
                                <form action="{{route('setting.destroy',$settings->id)}}" method="post" >
                                    @csrf
                                    {{method_field('delete')}}
                                    {{-- <button class="btn btn-primary alert-danger fas fa-trash-alt" onclick="return confirm('Are you sure?')" type="submit"></button> --}}
                                    <a class="btn btn-primary alert-success fas fa-edit" href="{{route('setting.edit',$settings->id)}}"></a>
                                </form>
                            </td>
                            <td><a href="">{{$settings->id}}</a></td>
                            <td>{{ $settings->web_title }}</td>
                            <td>{{ $settings->address }}</td>
                        </tr>



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>

@endsection
