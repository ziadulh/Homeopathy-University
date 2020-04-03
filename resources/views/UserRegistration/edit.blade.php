
@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Update Information</h3>
                    </div>

                    <form role="form" action="/registration/{{$user_registration_data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name"><font color="red">*</font>Full Name & Title (For Certificate)</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$user_registration_data->name}}">
                            </div>


                            <div class="form-group" id="t">
                                <label>Previous Photo</label>
                                <img src="{{  asset('/Photos/Users/'.$user_registration_data->photo)  }}" height="70px" width="60px">


                                <a class="btn btn-primary alert-danger fas fa-trash-alt deleteRecord" data-id="{{ $user_registration_data->id }}" data-confirm="Are you sure to delete this item?"></a>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo </label>
                                <input type="file" class="form-control" name="photo" id="photo">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 1mb</font></sub>
                                {{-- Maximum filesize: 1mb) --}}
                            </div>



                            <div class="form-group">

                                <font color="red">* </font>
                                <label for="nidCheck">NID</label>
                                <input type="checkbox" id="nidCheck" name="nid_or_passport_check" value="n" {{ (($user_registration_data->nid_or_passport_check) == 'n')? "checked" : "" }}>

                                <label for="nidPassport"> / Passport</label>
                                <input type="checkbox" id="nidPassport" name="nid_or_passport_check" value="p" {{ (($user_registration_data->nid_or_passport_check) == 'p')? "checked" : "" }}>

                                <input type="text" class="form-control" name="nid" id="nid" value="{{  $user_registration_data->nid  }}">
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label><br>
                                <div class="row">

                                    <div class="col-lg-1">
                                        <div style="padding-top:5px;text-align: justify;"><b>Student:</b></div>
                                    </div>

                                    <div class="col-lg-1">
                                        <input style="padding-top:5px" type="checkbox" id="dhms_stdn" name="dhms_stdn" value="1" {{ ($user_registration_data->bhms_stdn=="1")? "checked" : "" }}> <label style="padding-top:5px" for="dhms_stdn">DHMS</label>
                                    </div>

                                    <div class="col-lg-1">
                                        <input style="padding-top:5px" type="checkbox" id="bhms_stdn" name="bhms_stdn" value="1" {{ ($user_registration_data->dhms_stdn=="1")? "checked" : "" }}> <label style="padding-top:5px" for="bhms_stdn">BHMS</label>
                                    </div>

                                    <div class="col-lg-3">
                                        Others: <input style="width:150px" type="text" name="other_stdn" value="{{$user_registration_data->other_stdn}}">
                                    </div>

                                    <div class="col-lg-3">
                                        Session: <input style="width:150px" type="text" name="session_stdn" value="{{$user_registration_data->session_stdn}}">
                                    </div>
                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-lg-1">
                                        <div style="padding-top:5px"><b>Doctor:</b></div>
                                        
                                    </div>

                                    <div class="col-lg-1">
                                        <input style="padding-top:5px" type="checkbox" id="dhms_dctr" name="dhms_dctr" value="1" {{ ($user_registration_data->dhms_dctr=="1")? "checked" : "" }} > <label style="padding-top:5px" for="dhms_dctr">DHMS</label>
                                    </div>

                                    <div class="col-lg-1">
                                        <input style="padding-top:5px" type="checkbox" id="bhms_dctr" name="bhms_dctr" value="1" {{ ($user_registration_data->bhms_dctr=="1")? "checked" : "" }}> <label style="padding-top:5px" for="bhms_dctr">BHMS</label>
                                    </div>

                                    <div class="col-lg-3">
                                        Others: <input style="width:150px" type="text" name="other_dctr" value="{{$user_registration_data->other_dctr}}">
                                    </div>

                                    <div class="col-lg-3">
                                        Reg No: <input style="width:150px" type="text" name="regNo_dctr" value="{{$user_registration_data->regNo_dctr}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="ck">Non Professional Participant (Please Mention)</label> <input type="checkbox" name="np" id="ck" value="1" {{ $user_registration_data->npp ? "checked" : "" }}>
                            </div>

                            @if($user_registration_data->npp)

                                <div class="form-group">
                                    <label for="npp">Profession</label>
                                    <input type="text" class="form-control" name="npp" id="npp" value="{{$user_registration_data->npp}}"></input
                                </div>

                                <div class="form-group">
                                    <label for="institute">Institute</label>
                                    <input type="text" class="form-control" name="institute" id="institute" value="{{$user_registration_data->institute}}">
                                </div>

                            @else

                                <div class="form-group">
                                    <label for="npp">Profession</label>
                                    <input type="text" disabled class="form-control" name="npp" id="npp" value=""></input
                                </div>

                                <div class="form-group">
                                    <label for="institute">Institute</label>
                                    <input type="text" disabled class="form-control" name="institute" id="institute" value="">
                                </div>

                            @endif

                            <div class="form-group">
                                <label for="address"><font color="red">*</font>Adderss</label>
                                      <textarea class="textarea" name="address" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo htmlspecialchars($user_registration_data->address); ?></textarea>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="roll"><font color="red">*</font>Country</label>
                                        <select name="country" class="form-control" id="country">
                                            <option value="-1">Select Country</option>
                                            @foreach ($countries as $key=>$country)
                                                @if($user_registration_data->country == $key)
                                                    <option selected value="{{$key}}">{{$country }}</option>
                                                @else
                                                    <option value="{{$key}}">{{$country }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group" id="city">
                                        <div class="cntry">
                                            <label for=""><font color="red">*</font>Enter City Name</label>
                                            <input value="{{$user_registration_data->city}}" class="form-control" name="city"></input >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone"><font color="red">*</font>Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{$user_registration_data->phone}}">
                            </div>

                            <div class="form-group">
                                <label for="email"><font color="red">*</font>Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{$user_registration_data->email}}">
                            </div>


                                <div class="form-row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="payment"><font color="red">*</font>Payment</label>
                                            <select class="form-control" name="payment" id="payment">
                                                <option value="cash" {{ $user_registration_data->payment == "cash" ? "selected" : "" }}>Cash</option>
                                                <option {{ $user_registration_data->payment == "bank_transfer" ? "selected" : "" }} value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                    </div>


                                    @if($user_registration_data->payment == "bank_transfer")

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="old">
                                                    <label for="">Enter Account Number</label>
                                                    <input value="{{$user_registration_data->AcNumber}}" class="form-control" name = "AcNumber"></input >
                                                </div>

                                                <div class="new1">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="old">
                                                    <label for="">Enter Transection Number</label>
                                                    <input value="{{$user_registration_data->Transaction_no}}" class="form-control" name = "Transaction_no"></input >
                                                </div>
                                                <div class="new2">
                                                </div>
                                            </div>
                                        </div>

                                    @else

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="new1">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="new2">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group" id="s">
                                    <label>Previous Signature</label>
                                    <img src="{{  asset('/Photos/Signature/'.$user_registration_data->signature)  }}" height="30px" width="100px">


                                    <a class="btn btn-primary alert-danger fas fa-trash-alt deleteRecordsign" data-id="{{ $user_registration_data->id }}" data-confirm="Are you sure to delete signature?"></a>
                                </div>

                            <div class="form-group">
                                <label for="signature"><font color="red">*</font>Digital Signature</label>
                                <input type="file" class="form-control" name="signature" id="signature" value="{{$user_registration_data->signature}}">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 1mb</font></sub>
                            </div>


                            {{-- @endif --}}

                            <div class="form-group">
                                <label for="contactNo"><font color="red">*</font>Published</label>
                                <select class="form-control select2" style="width: 100%;" name="publish">

                                    @if ($user_registration_data->publish=="0")
                                        <option  value="1">Yes</option>
                                        <option selected value="0">No</option>
                                    @else
                                        <option selected value="1">Yes</option>
                                        <option value="0">No</option>
                                    @endif
                                </select>
                            </div>

                        </div>

                        {{method_field('PUT')}}

                        <div class="form-group">
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

        document.getElementById('nidCheck').onclick = function() {
            document.getElementById("nidPassport").checked = false;

        };

        document.getElementById('nidPassport').onclick = function() {
            document.getElementById("nidCheck").checked = false;

        };


        document.getElementById('ck').onchange = function() {
            document.getElementById('npp').disabled = !this.checked;
            document.getElementById('institute').disabled = !this.checked;

            var isDisabled = $('#npp').prop('disabled');
            var isDisabledIns = $('#institute').prop('disabled');
            if(isDisabled){
                $('#npp').val('');
            }
            if(isDisabledIns){
                $('#institute').val('');
            }
        };


        $('#payment').on('change',function () {

            console.log($(this).val());
            var payment_val = $(this).val();
            console.log(payment_val);
            if(payment_val == 'bank_transfer'){
                $('.new1').append(
                    '<div class="a">'+
                        '<label for="">Enter Account Number</label>'+
                        '<input class="form-control" name = "AcNumber"></input >'+
                    '</div>'
                );

                $('.new2').append(
                    '<div class="b">'+
                        '<label for="">Enter Transection Number</label>'+
                        '<input class="form-control" name = "Transaction_no"></input >'+
                    '</div>'
                );
            }

            if(payment_val == 'cash'){
                $('.a').remove();
                $('.b').remove();
                $('.old').remove();

            }
        });


        $(".deleteRecord").click(function(){

            var choice = confirm(this.getAttribute('data-confirm'));
            if(choice){
                var id = $(this).data("id");
            $.ajax(
            {
                url: '{{route('user.photo')}}',
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

        $(".deleteRecordsign").click(function(){

            var tr = confirm(this.getAttribute('data-confirm'));
            if(tr){
                var id = $(this).data("id");
                $.ajax(
                {
                    url: '{{route('user.sign')}}',
                    type: 'GET',
                    data: {
                        "id": id
                    },
                    success: function (data){
                        if(data != "No"){
                            $('#s').remove();
                        }
                    }
                });
            }
        });



    });



</script>
@endsection

