@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit Slider</h3>
                    </div>

                    <form role="form" action="{{route('slider.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title"><font color="red">*</font>Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}">
                            </div>

                            <div class="form-group">
                                <label for="description"><font color="red">*</font>Message</label>
                                      <textarea class="textarea" id = "description" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo htmlspecialchars($data->description); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 2mb</font></sub>
                            </div>

                            <div class="form-group" id="t">
                                <label>Previous Photo</label>
                                <img src="{{  asset('/Photos/Slider/'.$data->photo)  }}" height="100px" width="100px">
                                <a class="btn btn-primary alert-danger fas fa-trash-alt deleteRecord" data-id="{{ $data->id }}" data-confirm="Are you sure to delete this item?"></a>
                            </div>


                            <div class="form-group">
                                <label for="publish"><font color="red">*</font>Published</label>
                                <select type="text" class="form-control" id="publish" name="publish">
                                    <option {{($data->publish)==1 ? "selected" : ""}} value= "1" >Yes
                                    <option {{($data->publish)==0 ? "selected" : ""}} value= "0">No
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


@section('jsscript')
<script>

    $(document).ready(function () {

        $(".deleteRecord").click(function(){

            var choice = confirm(this.getAttribute('data-confirm'));
            if(choice){
            var id = $(this).data("id");

            $.ajax(
            {
                url: '{{route('sliderDelete')}}',
                type: 'GET',
                data: {
                    "id": id
                },
                success: function (data){
                    if(data != "No"){
                        $('#t').remove();
                    }
                }
            });
        }
        });
    });

</script>
@endsection
