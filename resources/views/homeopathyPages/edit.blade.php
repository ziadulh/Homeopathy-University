@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit Page Information</h3>
                    </div>

                    <form role="form" action="{{route('pages.update',$pages_table_data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title"><font color="red">*</font>Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$pages_table_data->title}}">
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{$pages_table_data->slug}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="description"><font color="red">*</font>Description</label>
                                <textarea type="text" class="form-control textarea" id="description" name="description"> <?php echo htmlspecialchars($pages_table_data->description); ?></textarea>
                            </div>


                            <div class="form-group">
                                <label for="photo">Upload a Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" value="{{$pages_table_data->photo}}">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 2mb</font></sub>
                            </div>

                            <div class="form-group" id="t">
                                <label>Previous Photo</label>
                                <img src="{{  asset('/Photos/HomeopathyPages/'.$pages_table_data->photo)  }}" height="100px" width="100px">

                                <a class="btn btn-primary alert-danger fas fa-trash-alt deleteRecord" data-id="{{ $pages_table_data->id }}" data-confirm="Are you sure to delete this item?"></a>
                            </div>

                            <div class="form-group">
                                <label for="third_party_code"><font color="red">*</font>Third Party Code</label>
                                <input type="text" class="form-control" id="third_party_code" name="third_party_code" value="{{$pages_table_data->third_party_code}}">
                            </div>

                            <div class="form-group">
                                <label for="publish"><font color="red">*</font>Published</label>
                                <select type="text" class="form-control" id="publish" name="publish">
                                    <option value= 1 >Yes
                                    <option value= 0>No
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
                url: '{{route('pageDelete')}}',
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
