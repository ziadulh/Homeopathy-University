
@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Registration Form</h3>
                    </div>

                    <form role="form" action="/registration" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">



                            {{-- <div class="form-group">
                                <label for="serial_no">Serial No.</label>
                                <input type="text" class="form-control" name="serial_no" id="serial_no">
                            </div> --}}

                            <div class="form-group">
                                <label for="name"><font color="red">*</font>Full Name & Title (For Certificate)</label>
                                <input type="text" value="{{old ('name')}}" class="form-control" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <label for="photo"><font color="red">*</font>Photo</label>
                                <input type="file" class="form-control" name="photo" id="photo">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 1mb</font></sub>
                            </div>



                            <div class="form-group">

                                <font color="red">* </font>
                                <label for="nidCheck">NID</label>
                                <input type="checkbox" id="nidCheck" name="nid_or_passport_check" value="n" {{ (old('nid_or_passport_check') == 'n')? "checked" : "" }}>

                                <label for="nidPassport"> / Passport</label>
                                <input type="checkbox" id="nidPassport" name="nid_or_passport_check" value="p" {{ (old('nid_or_passport_check') == 'p')? "checked" : "" }}>

                                <input type="text" class="form-control" name="nid" id="nid" value="{{  old('nid')  }}">
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label><br>
                                <div class="row">

                                    <div class="col-lg-1">
                                        <div style="padding-top:5px;text-align: justify;"><b>Student :</b></div>
                                        
                                    </div>

                                    <div class="col-lg-1">
                                        <input style="padding-top:5px" id="dhms_stdn" type="checkbox" name="dhms_stdn" value="1" {{ (old('dhms_stdn'))? "checked" : "" }}> <label style="padding-top:5px" for="dhms_stdn">DHMS</label>
                                    </div>

                                    <div class="col-lg-1">
                                        <input style="padding-top:5px" id="bhms_stdn" type="checkbox" name="bhms_stdn" value="1" {{ (old('bhms_stdn'))? "checked" : "" }}> <label style="padding-top:5px" for="bhms_stdn">BHMS</label>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="bhms_stdn">Others:</label> <input style="width:150px"  type="text" value="{{old ('other_stdn')}}" name="other_stdn">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="bhms_stdn">Session:</label> <input style="width:150px" type="text" value="{{old ('session_stdn')}}" name="session_stdn">
                                    </div>
                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-lg-1">
                                        <div style="padding-top:3px"><b>Doctor : </b> </div>
                                        
                                    </div>

                                    <div class="col-lg-1">
                                        <input style="padding-top:3px" id="dhms_dctr" type="checkbox" name="dhms_dctr" value="1" {{ (old('dhms_dctr'))? "checked" : "" }}>  <label style="padding-top:3px" for="dhms_dctr">DHMS</label>
                                    </div>

                                    <div class="col-lg-1">
                                        <input style="padding-top:3px" id="bhms_dctr" type="checkbox" name="bhms_dctr" value="1" {{ (old('bhms_dctr'))? "checked" : "" }}>  <label style="padding-top:3px" for="bhms_dctr">BHMS</label>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="bhms_stdn">Others: </label> <input style="width:150px" type="text" value="{{old ('other_dctr')}}" name="other_dctr">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="bhms_stdn">Reg No: </label> <input style="width:150px" type="text" value="{{old ('regNo_dctr')}}" name="regNo_dctr">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ck">Non Professional Participant (Please Mention)</label> <input type="checkbox" name="np" id="ck" value="1" {{ (old('np'))? "checked" : "" }}>
                            </div>

                            @if(old('np'))

                                <div class="form-group">
                                    <label for="npp"><font color="red">*</font>Profession</label>
                                    <input type="text" class="form-control" name="npp" id="npp" value="{{  old('npp')  }}"></input
                                </div>

                                <div class="form-group">
                                    <label for="institute"><font color="red">*</font>Institute</label>
                                    <input type="text" class="form-control" name="institute" id="institute" value="{{  old('institute')  }}">
                                </div>

                            @else

                                <div class="form-group">
                                    <label for="npp">Profession</label>
                                    <input type="text" disabled class="form-control" name="npp" id="npp" value="{{  old('npp')  }}"></input
                                </div>

                                <div class="form-group">
                                    <label for="institute">Institute</label>
                                    <input type="text" disabled class="form-control" name="institute" id="institute" value="{{  old('institute')  }}">
                                </div>

                            @endif

                            <div class="form-group">
                                <label for="address"><font color="red">*</font>Adderss</label>
                                      <textarea class="textarea" name="address" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo htmlspecialchars(old('address')); ?></textarea>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="roll"><font color="red">*</font>Country</label>
                                        <select name="country" class="form-control" id="country">
                                            <option value="-1">Select Country</option>
                                            @foreach ($countries as $key=>$country)
                                                <option value="{{$key}}" {{ (old('country') == $key)? "selected" : "" }}>{{$country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group" id="city">
                                        @if (old('city'))
                                            <div class="cntry">
                                                <label for=""><font color="red">*</font>Enter City Name</label>
                                                <input value="{{old('city')}}" class="form-control" name="city"></input >
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{--  /*<div class="col-md-3">
                                    <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                        <label for="roll"><font color="red">*</font>Division</label>
                                        <select name="city" class="form-control" id="state">
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                        <label for="roll"><font color="red">*</font>District </label>
                                        <select name="district" class="form-control" id="district">
                                        </select>
                                    </div>
                                </div> */ --}}
                            </div>


                            <div class="form-group">
                                <label for="phone"><font color="red">*</font>Phone</label>
                                <input type="text" class="form-control" value="{{old ('phone')}}" name="phone" id="phone">
                            </div>

                            <div class="form-group">
                                <label for="email"><font color="red">*</font>Email</label>
                                <input type="text" class="form-control" value="{{old ('email')}}" name="email" id="email">
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="payment"><font color="red">*</font>Payment</label>
                                        <select class="form-control" name="payment" id="payment">
                                            <option value="cash" {{ (old('cash') == 'bank_transfer')? "selected" : "" }}>Cash</option>
                                            <option value="bank_transfer" {{ (old('payment') == 'bank_transfer')? "selected" : "" }}>Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>

                                @if (old('AcNumber'))

                                        <div class="col-md-3 old">
                                            <div class="form-group">

                                                    <div>
                                                        <label for="">Enter Account Number</label>
                                                        <input value="{{old('AcNumber')}}" class="form-control" name = "AcNumber"></input >
                                                    </div>

                                            </div>
                                        </div>

                                @endif

                                @if (old('Transaction_no'))

                                        <div class="col-md-3 old">
                                            <div class="form-group">

                                                    <div>
                                                        <label for="">Enter Transection Number</label>
                                                        <input value="{{old('Transaction_no')}}" class="form-control" name = "Transaction_no"></input >
                                                    </div>

                                            </div>
                                        </div>

                                @endif

                                <div class="col-md-3">
                                    <div class="form-group" id="ac">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group" id="tn">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="signature"><font color="red">*</font>Digital Signature</label>
                                <input type="file" class="form-control" name="signature" id="signature">
                                <sub><font color="red">Supported image types (jpeg, png, jpg, gif, svg) Maximum filesize: 1mb</font></sub>
                            </div>


                            <div class="form-group">
                                <label for="contactNo"><font color="red">*</font>Publish</label>
                                <select class="form-control select2" style="width: 100%;" name="publish">
                                    <label for="contactNo">Publish/Unpublish</label>
                                    <option selected value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Register</button>
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
        /*$('#country').on('change',function () {
            $('select[name="city"]').empty();
            $('select[name="district"]').empty();
            debugger;
            var country_id =$(this).val();
            if(country_id){
                console.log(country_id);
                $.ajax({
                    type:'GET',
                    url:'{{route('findState')}}',
                    data:{'id':country_id},
                    dataType:'json',
                    success:function(data) {
                        debugger;
                        console.log(data);
                        $('select[name="city"]').append('<option>Choose Division</option>');
                        $.each(data, function(key,value){
                            console.log(key);
                            $('select[name="city"]').append('<option value="'+key+'" >' + value +'</option>');
                        });
                    }
                });
            }
            else{
                $('select[name="state"]').empty();
            }
        });


        $('#state').on('change',function () {
            $('select[name="district"]').empty();
            console.log($(this).val());
            var state_id=$(this).val();
            console.log(state_id);
            if(state_id){
                $.ajax({
                    type:'GET',
                    url:'{{route('findDistrict')}}',
                    data:{'id':state_id},
                    dataType:'json',
                    success:function(data) {
                        debugger;
                        console.log(data);
                        $('select[name="district"]').append('<option>Select District</option>');
                        $.each(data, function(key,value){
                            console.log(key);
                            $('select[name="district"]').append('<option value="'+key+'">' + value +'</option>');
                        });
                    }
                });
            }
            else{
                $('select[name="district"]').empty();
            }
        });*/

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
                {{-- $('#npp').removeAttr('value'); --}}
                $('#npp').val('');
            }
            if(isDisabledIns){
                $('#institute').val('');
            }
        };





        var counter = 0;
        $('#country').on('change',function () {

            var country_val = $(this).val();


            if(country_val){
                if(counter < 1){
                    $('.cntry').empty();
                    $('#city').append(
                    '<div class="cntry">'+
                        '<label for="">'+'<font color="red">*</font>'+'Enter City Name</label>'+
                        '<input class="form-control" name = "city"></input >'+
                    '</div>'
                    );
                    counter++;
                }
            }

            if(country_val == (-1)){
                $('.cntry').remove();
                counter--;
            }
        });




        $('#payment').on('change',function () {

            console.log($(this).val());
            var payment_val = $(this).val();

            if(payment_val == "bank_transfer"){
                $('.old').remove();
                $('#ac').append(
                    '<div class="des">'+
                        '<label for="">'+'<font color="red">*</font>'+'Enter AC number</label>'+
                        '<input class="form-control" name = "AcNumber"></input >'+
                    '</div>'
                );

                $('#tn').append(
                    '<div class="des">'+
                        '<label for="">'+'<font color="red">*</font>'+'Enter Trasection number</label>'+
                        '<input class="form-control" name = "Transaction_no"></input >'+
                    '</div>'
                );
            }

            if(payment_val == 'cash'){
                $('.old').remove();
                $('.des').remove();
            }
        });

    });

</script>
@endsection

