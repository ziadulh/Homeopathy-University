@extends('admin.app')

@section('content')

@include('Messages.message')



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Notice</h3>
                    </div>

                    <form role="form" action="{{route('notice.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title"><font color="red">*</font>Name</label>
                                <input type="text" class="form-control"  name="title" id="title" value="{{$data->title}}">
                            </div>

                            <div class="form-group">
                                <label for="description"><font color="red">*</font>notice</label>
                                      <textarea class="textarea" name="description" id="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo htmlspecialchars($data->description); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control"  name="photo" id="photo">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 2mb</font></sub>
                            </div>

                            <div class="form-group" id="prev_photo">
                                <label>Previous Photo</label>
                                <img src="{{  asset('/Photos/Notice/'.$data->photo)  }}" height="100px" width="100px">
                                <a class="btn btn-primary alert-danger fas fa-trash-alt deleteRecord" data-id="{{ $data->id }}" data-confirm="Are you sure to delete this item?"></a>

                            </div>


                            <div class="form-group">
                                <label for="home"><font color="red">*</font>Home</label>
                                <select class="form-control select2" style="width: 100%;" id="home" name="home">
                                    <option {{($data->home)==1 ? "selected" : ""}}  value="1">Yes</option>
                                    <option {{($data->home)==0 ? "selected" : ""}} value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="publish"><font color="red">*</font>Publish</label>
                                <select class="form-control select2" style="width: 100%;" id="publish" name="publish">
                                    <option {{($data->publish)==1 ? "selected" : ""}} value="1">Yes</option>
                                    <option {{($data->publish)==0 ? "selected" : ""}} value="0">No</option>
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
                    url: '{{route('noticephoto.destroy')}}',
                    type: 'GET',
                    data: {
                        "id": id
                    },
                    success: function (data){
                        if(data != "No"){
                            $('#prev_photo').remove();
                            $('#t').remove();
                        }
                    }
                });
            }
        });

    });



</script>
@endsection

