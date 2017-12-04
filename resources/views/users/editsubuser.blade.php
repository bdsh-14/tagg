@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Profilez</div>

                    <div class="panel-body">

                        {!! Form::model($user, ['method' => 'POST', 'route'=>['updatesubuser'], 'class' => 'form-horizontal']) !!}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="">
                            {!! Form::hidden('id',$user->id,['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="first_name" class="col-md-4 control-label"> First Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">
                                {!! Form::text('first_name',null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-md-4 control-label"> Last Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">
                                {!! Form::text('last_name', null,['class' => 'form-control', 'required']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">{!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="organization_id" class="col-md-4 control-label">Business Location <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">
                                {!! Form::select('organization_id', $organizationStatusArray, $user->organization_id, ['class' => 'form-control', 'id' => 'loc-drop-down', 'required']) !!}
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('Business Location', 'Business Location') !!}--}}
                            {{--<span style="color: red; font-size: 20px; vertical-align:middle;">*</span>--}}
                            {{--{!! Form::select('location', array_merge(['' => '-- Please Select --'], $organizationStatusArray), null, ['class' => 'form-control', 'id' => 'loc-drop-down', 'required']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="role" class="col-md-4 control-label"> Role <span--}}
                                        {{--style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>--}}
                            {{--<div class="col-lg-6">--}}
                                {{--{!! Form::select('role_id', $roles, $user->roles->first()->id, ['class' => 'form-control']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <div class="form-group" id="role-group" style="display:block">

                            <label for="Role" class="col-md-4 control-label"> Role: <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">
                                @if(App\ParentChildOrganizations::active()->where('parent_org_id', $user->organization->id)->count() > 0)
                                    {!! Form::select('role_id', $roles, $user->roles->first()->id, ['class' => 'form-control', 'id' => 'locations-drop-down-parent', 'style' => 'display:block']) !!}
                                    {!! Form::select('role_id', array('5' => $roles[5]), $user->roles->first()->id, ['class' => 'form-control', 'id' => 'locations-drop-down-child', 'style' => 'display:none']) !!}
                                @else
                                    {!! Form::select('role_id', $roles, $user->roles->first()->id, ['class' => 'form-control', 'id' => 'locations-drop-down-parent']) !!}
                                    {!! Form::select('role_id', array('5' => $roles[5]), $user->roles->first()->id, ['class' => 'form-control', 'id' => 'locations-drop-down-child', 'style' => 'display:block']) !!}
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<label for="street_address1" class="col-md-4 control-label">Address 1 <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>--}}
                            {{--<div class="col-lg-6">{!! Form::text('street_address1',null,['class' => 'form-control', 'required']) !!}</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="street_address2" class="col-md-4 control-label"> Address 2 </label>--}}
                            {{--<div class="col-lg-6">   {!! Form::text('street_address2', null,['class'=>'form-control']) !!}</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="city" class="col-md-4 control-label">City <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>--}}
                            {{--<div class="col-lg-6">{!! Form::text('city',null,['class' => 'form-control', 'required']) !!}</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="state" class="col-md-4 control-label">State <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>--}}

                            {{--<div class="col-md-6">--}}

                                {{--{!! Form::select('state', array(null => 'Select...') + $states->all(), null, ['class'=>'form-control']) !!}--}}

                                {{--@if ($errors->has('state'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('state') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--<label for="zipcode" class="col-md-4 control-label">Zip code <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>--}}
                            {{--<div class="col-lg-6"> {!! Form::text('zipcode',null,['class' => 'form-control', 'required']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">--}}
                            {{--<label for="phone_number" class="col-md-4 control-label">Phone Number <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>--}}
                            {{--<div class="col-lg-6">--}}
                                {{--{!! Form::text('phone_number',null,['class' => 'form-control', 'required']) !!}--}}
                                {{--@if ($errors->has('phone_number'))--}}
                                    {{--<span class="help-block">--}}
                                      {{--<strong>{{ $errors->first('phone_number') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Update', ['class' => 'btn updatebtn']) !!}
                                <input class="btn backbtn" type="button" value="Cancel" onClick="history.go(-1);">
                                <span style="color: red"> <h5>Fields Marked With (<span style="color: red; font-size: 20px; vertical-align:middle;">*</span>) Are Mandatory</h5></span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#loc-drop-down").change(function () {

            if (this.value.startsWith('parent')) {
                document.getElementById("locations-drop-down-parent").style.display = "block";
                document.getElementById("locations-drop-down-child").style.display = "none";
                document.getElementById("locations-drop-down-child").setAttribute('name', 'dummy-name');
                document.getElementById("locations-drop-down-parent").setAttribute('name', 'role_id');
            } else if (this.value.startsWith('child')) {
                document.getElementById("locations-drop-down-child").style.display = "block";
                document.getElementById("locations-drop-down-parent").style.display = "none";
                document.getElementById("locations-drop-down-parent").setAttribute('name', 'dummy-name');
                document.getElementById("locations-drop-down-child").setAttribute('name', 'role_id');
            }
        });
    </script>
@endsection
