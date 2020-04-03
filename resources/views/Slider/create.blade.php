@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Add Slider</h3>
                    </div>

                    <form role="form" action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title"><font color="red">*</font>Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Slider Description</label>
                                      <textarea class="textarea" id = "description" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo htmlspecialchars(old('description')); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo"><font color="red">*</font>Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 2mb</font></sub>
                            </div>


                            <div class="form-group">
                                <label for="publish"><font color="red">*</font>Published</label>
                                <select type="text" class="form-control" id="publish" name="publish">
                                    <option value= "1" >Yes
                                    <option value= "0">No
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
