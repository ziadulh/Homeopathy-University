@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Create Message</h3>
                    </div>

                    <form role="form" action="{{route('message.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title"><font color="red">*</font>Title</label>
                                <input type="text" class="form-control"  name="title" id="title" value="{{old('title')}}">
                            </div>

                            <div class="form-group">
                                <label for="title"><font color="red">*</font>Message</label>
                                      <textarea class="textarea" name="message" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo htmlspecialchars(old('message')); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo"><font color="red">*</font>Photo</label>
                                <input type="file" class="form-control"  name="photo" id="photo">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 2mb</font></sub>
                            </div>


                            <div class="form-group">
                                <label for="publish"><font color="red">*</font>Publish</label>
                                <select class="form-control select2" style="width: 100%;" id="publish" name="publish">
                                    <option selected value=1>Yes</option>
                                    <option value=0>No</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

