

{{--  <style type="text/css">
	table td, table th{
        width: 150px;
        padding-top: 15px;
	}
</style>

<h2 align="center">Your submitted information</h2>  --}}





<div class="container">

	{{--  <br/>
    <a href="{{ route('pdfview',$user_data->id,['download'=>'pdf']) }}">Download PDF</a>  --}}


    <h3 align="center" style="color:red;">IN CELEBRATION OF 225 YEARS OF HOMEOPATHY</h3>
    <h4 align="center" style="color:green;">INTERNATIONAL HOMEOPATHIC SCINTIFIC SEMINAR-2020</h4>

    <table>

        <tr>
            <div align="left" style="color:black;"><b> Serial No :</b>  {{$user_data->serial_no}}</div>
            <div align="center" style="color:red;">3rd and 4th July -2020</div>
        </tr>

    </table>



    <table style="padding-top:15px;">

        <tr>
            <th>Full Name & Title (For Certificate) : </th>
            <td style="width:350px;border-bottom: 1px dotted;">{{$user_data->name}} </td>
        </tr>

    </table>

    <div style="padding-top:20px;">
        <b>Catagory</b><br>
        Student :
    </div>


    <table>

        <tr>
            <th style="width:10px"><input type="checkbox" {{ ($user_data->dhms_stdn=="1")? "checked" : "" }} readonly></th> <td style="width:60px;padding-left:3px;">DHMS</td>

            <th style="width:10px"><input type="checkbox" {{ ($user_data->bhms_stdn=="1")? "checked" : "" }} readonly></th> <td style="width:60px;padding-left:3px;">BHMS</td>


            <th style="width:100:px;">Other :</th>
            <td style="width:150:px; border-bottom: 1px dotted;">
                @if($user_data->other_stdn)
                {{$user_data->other_stdn}}
                @else
                N\A
                @endif
            </td>

            <th style="width:100:px;">Session :</th>
            <td style="width:150:px; border-bottom: 1px dotted;">
                @if($user_data->session_stdn)
                {{$user_data->session_stdn}}
                @else
                N\A
                @endif
            </td>
        </tr>

    </table>



    Doctor :


    <table>

        <tr>
            <th style="width:10px"><input type="checkbox" {{ ($user_data->dhms_dctr=="1")? "checked" : "" }} readonly></th> <td style="width:60px;padding-left:3px;">DHMS</td>

            <th style="width:10px"><input type="checkbox" {{ ($user_data->bhms_dctr=="1")? "checked" : "" }} readonly></th> <td style="width:60px;padding-left:3px;">BHMS</td>


            <th style="width:100:px;">Other :</th>
            <td style="width:150:px; border-bottom: 1px dotted;">
                @if($user_data->other_dctr)
                {{$user_data->other_dctr}}
                @else
                N\A
                @endif
            </td>

            <th style="width:100:px;">Reg. No. :</th>
            <td style="width:150:px; border-bottom: 1px dotted;">
                @if($user_data->regNo_dctr)
                {{$user_data->regNo_dctr}}
                @else
                N\A
                @endif
            </td>
        </tr>

    </table>

    <div style="padding-top:20px;">
        <b>Non Professional (If applicable)</b><br>
    </div>


    <table>

        <tr>

            <td>Profession :</th>
            <td style="width:600:px; border-bottom: 1px dotted;">
                @if($user_data->npp)
                {{$user_data->npp}}
                @else
                N\A
                @endif
            </td>
        </tr>

    </table>

    <table>

        <tr>
            <td>Institute :</td>
            <td style="width:600:px; border-bottom: 1px dotted;">
                @if($user_data->institute)
                {{$user_data->institute}}
                @else
                N\A
                @endif
            </td>
        </tr>

    </table>

    <table>
        <tr>
            <th> Address :</th>
            <td style="width:600:px; border-bottom: 1px dotted;"> {!!$user_data->address!!}</td>
        </tr>
    </table>

    <table style="padding-top:15px">
        <tr>
            <th> Country :</th> <td style="width:250:px; border-bottom: 1px dotted;"> {{$country->name}} </td>
            <th style="padding-left:20px"> City :</th> <td style="width:250:px; border-bottom: 1px dotted;"> {{$user_data->city}} </td>
        </tr>
    </table>

    <table style="padding-top:15px">
        <tr>
            <th> Phone :</th> <td style="width:600:px; border-bottom: 1px dotted;"> {{$user_data->phone}} </td>
        </tr>
    </table>

    <table style="padding-top:15px">
        <tr>
            <th> Email :</th> <td style="width:600:px; border-bottom: 1px dotted;"> {{$user_data->email}} </td>
        </tr>
    </table>

    <table style="padding-top:20px">
        <tr>
            <th align="right" style="width:693:px;">(Received By)</th>
        </tr>
    </table>

    <table style="padding-top:15px">
        <tr>
            <th align="right" style="width:700:px;">(...Full Name...)</th>
        </tr>
    </table>


	{{--  <table>
		<tr>
            <th>Full Name & Title (For Certificate) : </th>
            <td style="padding-left:20px">{{$user_data->name}} </td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <th>NID/ Passport : </th>
            <td> {{$user_data->nid}} </td>
            <td></td>
            <td></td>
        </tr>



        <br>
        <br>

        <tr>
            <th>Category : Student </th>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td style="padding-left:20px"><input disabled type="checkbox" {{ ($user_data->dhms_stdn=="1")? "checked" : "" }} readonly>DHMS</td>
            <td style="padding-left:20px"><input disabled type="checkbox" {{ ($user_data->bhms_stdn=="1")? "checked" : "" }} readonly>BHMS</td>
            <td style="padding-left:20px">Other : {{$user_data->other_stdn}}</td>
            <td style="padding-left:20px">Session : {{$user_data->session_stdn}}</td>
        </tr>

        <br>
        <br>

        <tr>
            <th>Category : Doctor </th>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td style="padding-left:20px"><input disabled type="checkbox" {{ ($user_data->dhms_dctr=="1")? "checked" : "" }} readonly>DHMS</td>
            <td style="padding-left:20px"><input disabled type="checkbox" {{ ($user_data->bhms_dctr=="1")? "checked" : "" }} readonly>BHMS</td>
            <td style="padding-left:20px">Other : {{$user_data->other_dctr}}</td>
            <td style="padding-left:20px">Registration No. : {{$user_data->regNo_dctr}}</td>
        </tr>

        <tr>
            <th>Non Professionals (if applicable)</th>
            <td>Profession : {{$user_data->npp}}</td>
            <td>Institute : {{$user_data->institute}}</td>
            <td></td>
        </tr>

        <tr>
            <th>Address</th>
            <td></td>
            <td>{!!$user_data->address!!}</td>
            <td></td>
        </tr>

        <tr>
            <th>Country : </th>
            <td></td>
            <td>{{$country->name}}</td>
            <td></td>
        </tr>

        <tr>
            <th>City : </th>
            <td></td>
            <td> {{$user_data->city}}</td>
            <td></td>
        </tr>

        <tr>
            <th>Phone</th>
            <td></td>
            <td>{{$user_data->phone}}</td>
            <td></td>
        </tr>

        <tr>
            <th>Email</th>
            <td></td>
            <td>{{$user_data->email}}</td>
            <td></td>
        </tr>  --}}

        {{-- <tr>
            <th> NID/ Passport </th>
            <td> {{$user_data->nid}}</td>
        </tr>


        <tr>
            <th> DHMS (Category:Student)</th>
            <td> <input disabled type="checkbox" name="dhms_stdn" value="1" {{ ($user_data->dhms_stdn=="1")? "checked" : "" }} readonly> DHMS</td>
        </tr>

        <tr>
            <th> BHMS (Category:Student)</th>
            <td>  <input disabled type="checkbox" name="bhms_stdn" value="1" {{ ($user_data->bhms_stdn=="1")? "checked" : "" }} readonly> BHMS</td>
        </tr>

        <tr>
            <th> Other (Category:Student)</th>
            <td> {{$user_data->other_stdn}}</td>
        </tr>

        <tr>
            <th> Session (Category:Student)</th>
            <td>{{$user_data->session_stdn}}</td>
        </tr>

        <tr>
            <th> DHMS (Category:Doctor)</th>
            <td> <input disabled type="checkbox" name="dhms_dctr" value="1" {{ ($user_data->dhms_dctr=="1")? "checked" : "" }}> DHMS</td>
        </tr>

        <tr>
            <th> BHMS (Category:Doctor)</th>
            <td>  <input disabled type="checkbox" name="bhms_dctr" value="1" {{ ($user_data->bhms_dctr=="1")? "checked" : "" }} readonly> BHMS</td>
        </tr>

        <tr>
            <th> Other (Category:Doctor)</th>
            <td> {{$user_data->other_dctr}}</td>
        </tr>

        <tr>
            <th> Registration No. (Category:Doctor)</th>
            <td> {{$user_data->regNo_dctr}}</td>
        </tr>

        <tr>
            <th> Address </th>
            <td> {!!$user_data->address!!}</td>
        </tr> --}}



        {{--  <tr>
            <th> District </th>
            <td> {{$user_data->phone}}</td>
        </tr>  --}}

        {{-- <tr>
            <th> Email </th>
            <td> {{$user_data->email}}</td>
        </tr> --}}

        {{--  <tr>
            <th> Country </th>
            <td> {{$country->name}}</td>
        </tr>  --}}

        {{--  <tr>
            <th> Country </th>
            <td> {{$division->name}}</td>
        </tr>

        <tr>
            <th> Country </th>
            <td> {{$district->name}}</td>
        </tr>  --}}
	{{--  </table>  --}}
</div>

