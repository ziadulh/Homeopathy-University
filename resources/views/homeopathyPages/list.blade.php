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

              {{-- <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: relative;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Change</th>
                    <th>Sl No</th>
                    <th>Page Title</th>
                    <th>Description</th>
                    <th>Photo</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($pages_table_data as $key => $pages_table_data)

                        <tr>
                            <td>
                                <form action="{{route('pages.destroy',$pages_table_data->id)}}" method="post" >
                                    @csrf
                                    {{-- {{method_field('delete')}}
                                    <button class="btn btn-primary alert-danger fas fa-trash-alt" onclick="return confirm('Are you sure?')" type="submit"></button> --}}
                                    <a class="btn btn-primary alert-success fas fa-edit" href="{{route('pages.edit',$pages_table_data->id)}}"></a>
                                </form>
                            </td>
                            <td>{{$key+1}}</td>
                            {{-- link will go href teg /pages/{{$pages_table_data->id}} --}}
                            {{-- <td><a href="">{{$pages_table_data->title}}</a></td> --}}
                            <td>{{$pages_table_data->title}}</td>
                            <td>{!!$pages_table_data->description!!}</td>
                            <td><img src="{{  asset('/Photos/HomeopathyPages/'.$pages_table_data->photo)  }}" height="100px" width="100px"></td>
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



