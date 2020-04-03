
@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">User Information</h3>
                    </div>

                    <form role="form" action="/registration/{{$user_registration_data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Full Name & Title (For Certificate) : </label> : {{$user_registration_data->name}}
                            </div>


                            <div class="form-group">
                                <label>Photo</label> :
                                <img src="{{  asset('/Photos/Users/'.$user_registration_data->photo)  }}" height="70px" width="60px">
                            </div>


                            <div class="form-group">
                                <label for="nid">NID/ Passport</label> : {{$user_registration_data->nid}}
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label><br>
                                <div class="row">

                                    <div class="col-lg-1">
                                        <b>Student</b> :
                                    </div>

                                    <div class="col-lg-1">
                                        <input type="checkbox" name="dhms_stdn" value="1" disabled {{ ($user_registration_data->bhms_stdn=="1")? "checked" : "" }}> DHMS
                                    </div>

                                    <div class="col-lg-1">
                                        <input type="checkbox" name="bhms_stdn" disabled value="1" {{ ($user_registration_data->dhms_stdn=="1")? "checked" : "" }}> BHMS
                                    </div>

                                    <div class="col-lg-3">
                                        Others: {{$user_registration_data->other_stdn}}
                                    </div>

                                    <div class="col-lg-3">
                                        Session: {{$user_registration_data->session_stdn}}
                                    </div>
                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-lg-1">
                                        <b>Doctor</b> :
                                    </div>

                                    <div class="col-lg-1">
                                        <input type="checkbox" name="dhms_dctr" disabled value="1" {{ ($user_registration_data->dhms_dctr=="1")? "checked" : "" }} > DHMS
                                    </div>

                                    <div class="col-lg-1">
                                        <input type="checkbox" name="bhms_dctr" disabled value="1" {{ ($user_registration_data->bhms_dctr=="1")? "checked" : "" }}> BHMS
                                    </div>

                                    <div class="col-lg-3">
                                        Others: {{$user_registration_data->other_dctr}}
                                    </div>

                                    <div class="col-lg-3">
                                        Reg No: {{$user_registration_data->regNo_dctr}}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                Non Professional Participant (Pls Mention) <input type="checkbox" name="np" id="ck" value="1" {{ $user_registration_data->npp ? "checked" : "" }} disabled>
                            </div>

                            @if($user_registration_data->npp)

                                <div class="form-group">
                                    <label for="npp">Profession</label> : {{$user_registration_data->npp}}
                                </div>

                                <div class="form-group">
                                    <label for="institute">Institute</label> : {{$user_registration_data->institute}}
                                </div>


                            @endif

                            <div class="form-group">
                                <label for="address">Adderss</label> : {!!$user_registration_data->address!!}
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="roll">Country</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group" id="city">
                                        <div class="cntry">
                                            <label for="">Enter City Name</label> : {{$user_registration_data->city}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label> : {{$user_registration_data->phone}}
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label> : {{$user_registration_data->email}}
                            </div>


                                <div class="form-row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="payment">Payment</label>
                                            <select disabled class="form-control" name="payment" id="payment">
                                                <option value="cash"  {{ $user_registration_data->payment == "cash" ? "selected" : "" }}>Cash</option>
                                                <option {{ $user_registration_data->payment == "bank_transfer" ? "selected" : "" }} value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                    </div>


                                    @if($user_registration_data->payment == "bank_transfer")

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="old">
                                                    <label for="">Enter Account Number</label> : {{$user_registration_data->AcNumber}}
                                                </div>

                                                <div class="new1">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="old">
                                                    <label for="">Enter Transection Number</label> : {{$user_registration_data->Transaction_no}}
                                                </div>
                                                <div class="new2">
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                </div>

                            <div class="form-group">
                                <label for="signature">Digital Signature</label>
                                <img src="{{  asset('/Photos/Signature/'.$user_registration_data->signature)  }}" height="40px" width="100px">
                            </div>


                            {{-- @endif --}}

                            <div class="form-group">
                                <label for="contactNo">Publish</label>
                                <select disabled class="form-control select2" style="width: 100%;" name="publish">
                                    <label for="contactNo">Publish/Unpublish</label>
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


                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('jsscript')
<script>

    $(document).ready(function () {

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



    });



</script>
@endsection

