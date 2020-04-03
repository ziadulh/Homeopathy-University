@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit Settings</h3>
                    </div>

                    <form role="form" action="{{route('setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="web_title">Web Title</label>
                                <input type="text" class="form-control"  name="web_title" id="title" value="{{$setting->web_title}}">
                            </div>

                            <div class="form-group">
                                <label for="phone">phone</label>
                                <input type="text" class="form-control"  name="phone" id="phone" value="{{$setting->phone}}">
                            </div>


                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control"  name="logo" id="logo">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 1mb</font></sub>
                            </div>

                            <div class="form-group" id="t">
                                <label>Previous Photo</label>
                                <img src="{{  asset('/Photos/Logo/'.$setting->logo)  }}" height="70px" width="70px">
                                <a class="btn btn-primary alert-danger fas fa-trash-alt deleteRecord" data-id="{{ $setting->id }}" data-confirm="Are you sure to delete this item?"></a>
                            </div>

                            <div class="form-group">
                                <label for="third_party_code">Third Perty Code</label>
                                <textarea class="form-control textarea"  name="third_party_code" id="third_party_code"><?php echo htmlspecialchars($setting->third_party_code); ?></textarea>
                            </div>

                            <div class="form-group">

                                <label for="address">Address</label>
                                <textarea class="form-control textarea"  name="address" id="address"><?php echo htmlspecialchars($setting->address); ?></textarea>

                                {{--  <label for="address">Address</label>
                                <input type="text" class="form-control"  name="address" id="address" value="{{$setting->address}}">  --}}
                            </div>

                            <div class="form-group">
                                <label for="copy_rights">Copy Right</label>
                                <input type="text" class="form-control"  name="copy_rights" id="copy_rights" value="{{$setting->copy_rights}}">
                            </div>

                            <div class="form-group">
                                <label for="meta_tag">Meta Tag</label>
                                <input type="text" class="form-control"  name="meta_tag" id="meta_tag" value="{{$setting->meta_tag}}">
                            </div>

                            <div class="form-group">
                                <label for="site_admin_phone">Phone</label>
                                <input type="text" class="form-control"  name="site_admin_phone" id="site_admin_phone" value="{{$setting->site_admin_phone}}">
                            </div>

                            <div class="form-group">
                                <label for="site_admin_email">Email</label>
                                <input type="text" class="form-control"  name="site_admin_email" id="site_admin_email" value="{{$setting->site_admin_email}}">
                            </div>

                            <div class="form-group">
                                <label for="fb">Facebook Link</label>
                                <input type="text" class="form-control"  name="fb" id="fb" value="{{$setting->fb}}">
                            </div>

                            <div class="form-group">
                                <label for="tw">Twitter Link</label>
                                <input type="text" class="form-control"  name="tw" id="tw" value="{{$setting->tw}}">
                            </div>

                            <div class="form-group">
                                <label for="ins">Instagram Link</label>
                                <input type="text" class="form-control"  name="ins" id="ins" value="{{$setting->ins}}">
                            </div>

                            {{-- <div class="form-group">
                                <label for="publish">Publish</label>
                                <select class="form-control select2" style="width: 100%;" id="publish" name="publish">
                                    <option selected value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div> --}}

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
                    url: '{{route('settingDelete')}}',
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

