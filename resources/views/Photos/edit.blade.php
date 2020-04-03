@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit Photo </h3>
                    </div>

                    <form role="form" action="{{route('photo.update',$photo->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title"><font color="red">*</font>Name</label>
                                <input type="text" class="form-control"  name="title" id="title" value="{{$photo->title}}">
                            </div>

                            <div class="form-group">
                                <label for="album_id"><font color="red">*</font>Select Album</label>
                                <select type="text" class="form-control"  name="album_id" id="album_id">
                                    @foreach ($album as $album)
                                        @if ($photo->album_id == $album->id)
                                            <option selected value="{{$album->id}}">{{$album->title}}</option>
                                        @else
                                            <option value="{{$album->id}}">{{$album->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                      <textarea class="textarea" name="description" id="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo htmlspecialchars($photo->description); ?></textarea>
                            </div>

                            <div class="form-group" id="t">
                                <label for="title">Previous Photo</label>
                                <img height="100px" width="100px" src="{{asset('/Photos/Photos/'.$photo->photo)}}">
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control"  name="photo" id="photo">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 2mb</font></sub>
                            </div>



                            <div class="form-group">
                                <label for="publish"><font color="red">*</font>Publish</label>
                                <select class="form-control select2" style="width: 100%;" id="publish" name="publish">
                                    <option {{($photo->publish)==1 ? "selected" : ""}} value="1">Yes</option>
                                    <option {{($photo->publish)==0 ? "selected" : ""}} value="0">No</option>
                                </select>
                            </div>

                        </div>

                        {{method_field('PUT')}}

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection



