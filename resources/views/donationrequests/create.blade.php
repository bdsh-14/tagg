@extends('layouts.app')


@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>



    <script type="text/javascript">
        function yesnoCheck() {
            if (document.getElementById('yesCheck').checked) {
                document.getElementById('file_upload').style.visibility = 'visible';
            }
            else {
                document.getElementById('file_upload').style.visibility = 'hidden';
            }
        }


//        function explain() {
//            console.log('asdf');
//            var e = document.getElementById("item_requested");
//            var strUser = e.options[e.selectedIndex].text;
//            if ($strUser == 'Other (please explain)')
//                this.form['item_requested_explain'].style.visibility = 'visible'
//            else
//                this.form['item_requested_explain'].style.visibility = 'hidden'
//        }

        $(window).load(function () {
            var phones = [{"mask": "(###) ###-####"}, {"mask": "(###) ###-##############"}];
            $('#phonenumber').inputmask({
                mask: phones,
                greedy: false,
                definitions: {'#': {validator: "[0-9]", cardinality: 1}}
            });
        });


    </script>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Donation Request Form</div>

                    <div class="panel-body">

                    {!! Form::open(['url' => 'attachment', 'class' => 'form-horizontal', 'id' => 'attachment', 'files' => true]) !!}
                    {{ csrf_field() }}


                    <!-- <form class="form-horizontal" method="POST" action="{{ action('DonationRequestController@store') }}">
                            {{ csrf_field() }} -->
                        <input type="hidden" name="orgId" value="{{ $_GET['orgId'] }}">
                        <div class="form-group{{ $errors->has('requester') ? ' has-error' : '' }}">
                            <label for="requester" class="col-md-4 control-label">Name of the Organization <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-md-6">

                                <input id="requester" type="text" class="form-control" name="requester"
                                       value="{{ old('requester')}}" placeholder="Name of Your Organization" required
                                       autofocus>



                                @if ($errors->has('requester'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('requester') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('requester_type') ? ' has-error' : '' }}">
                            <label for="requester_type" class="col-md-4 control-label">Organization Type <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                {!! Form::select('requester_type', array(null => 'Select...') + $requester_types->all(), null, ['class'=>'form-control']) !!}
                                @if ($errors->has('requester_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('requester_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required
                                       title="Your First Name should be 2-20 characters long." class="form-control"
                                       name="firstname" value="{{ old('firstname') }}"
                                       placeholder="Enter Your First Name" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required
                                       title="Your Last Name should be 2-20 characters long." class="form-control"
                                       name="lastname" value="{{ old('lastname') }}" placeholder="Enter Your Last Name"
                                       required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email Address <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" placeholder="Enter Your Email Address" autofocus
                                       required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                            <label for="phonenumber" class="col-md-4 control-label">Phone Number <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control"
                                       name="phonenumber" value="{{ old('phonenumber') }}" required
                                       autofocus>



                                @if ($errors->has('phonenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                            <label for="address1" class="col-md-4 control-label">Address 1 <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}" placeholder="Street Address/PO Box" required autofocus>

                                @if ($errors->has('address1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address2" class="col-md-4 control-label">Address 2</label>
                            <div class="col-md-6">
                                <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}" placeholder="Address 2">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}"
                                       placeholder="Enter Your City" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State <span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                            <div class="col-md-6">
                                {!! Form::select('state', array(null => 'Select...') + $states->all(), null, ['class'=>'form-control', 'required']) !!}
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                            <label for="zipcode" class="col-md-4 control-label">Zip Code <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="zipcode" type="text" pattern="[0-9]{5}" required
                                       title="Enter a 5 digit zipcode" class="form-control" name="zipcode"
                                       value="{{ old('zipcode') }}" placeholder="Zip Code" required autofocus>

                                @if ($errors->has('zipcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('taxexempt') ? ' has-error' : '' }}">
                            <label for="taxexempt" class="col-md-4 control-label"> Are you a 501c3? <span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                            <div class="col-md-6">

                                <label for="chkYes">
                                    <input type="radio" onclick="yesnoCheck();" name="taxexempt" id="yesCheck"
                                           value="1">Yes
                                </label>
                                <label for="chkNo">
                                    <input type="radio" onclick="yesnoCheck();" name="taxexempt" id="noCheck" value="0">No
                                </label>
                                @if ($errors->has('taxexempt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('taxexempt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" id="file_upload"  style="visibility:hidden">
                            {!! Form::label('attachment', 'Attachment',['class'=>'col-md-4 control-label','id'=>'mandatory-field']) !!}
                            <div class="col-md-4">
                                {!! Form::file('attachment',['id'=>'attachment']) !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('item_requested') ? ' has-error' : '' }}">
                            <label for="item_requested" class="col-md-4 control-label">Request For <span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                            <div class="col-md-6">
                                {!! Form::select('item_requested', array_merge(['' => '-- Please Select --'], $request_item_types->all()), null, ['id' => 'item_requested','class'=>'form-control', 'required']) !!}
                                @if ($errors->has('item_requested'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('item_requested') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group" id="explain"  style="visibility:hidden">

                            {!! Form::label('explain', 'Explain',['class'=>'col-md-4 control-label','id'=>'mandatory-field']) !!}
                            <div class="col-md-6">
                                <textarea id="item_requested_explain" class="form-control" pattern="[a-zA-Z0-9\s]"
                                          maxlength="1000" required
                                          title="Please restrict your Text Length to 100 characters"
                                          rows="3"
                                          placeholder="Explain the Item Requested within 100 characters"
                                          autofocus style="visibility:hidden;"></textarea>
                                <!--<input id="item_requested_explain" type="textbox" name="other" style="visibility:hidden;" required autofocus/>-->
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('item_purpose') ? ' has-error' : '' }}">
                            <label for="item_purpose" class="col-md-4 control-label">Donation Purpose <span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>
                            <div class="col-md-6">
                                {!! Form::select('item_purpose', array_merge(['' => '-- Please Select --'], $request_item_purpose->all()), null, ['id' => 'item_purpose','class'=>'form-control', 'required']) !!}
                                @if ($errors->has('item_purpose'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('item_purpose') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" id="explain_purpose"  style="visibility:hidden">

                            {!! Form::label('explain_purpose', 'Explain_purpose',['class'=>'col-md-4 control-label','id'=>'mandatory-field']) !!}
                            <div class="col-md-6">
                                <textarea id="item_purpose_explain" class="form-control" pattern="[a-zA-Z0-9\s]"
                                          maxlength="100" required
                                          title="Please restrict your Text Length to 100 characters"
                                          rows="3"
                                          placeholder="Explain the Item Purpose within 100 characters"
                                          autofocus style="visibility:hidden;"></textarea>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('startdate') ? ' has-error' : '' }}">
                            <label for="needed_by_date" class="col-md-4 control-label">Needed by Date <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="needed_by_date" type="date" class="form-control" name="needed_by_date" value="{{ old('needed_by_date') }}" placeholder="The Request Needed Date" required autofocus>

                                @if ($errors->has('needed_by_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('needed_by_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('eventname') ? ' has-error' : '' }}">
                            <label for="eventname" class="col-md-4 control-label">Name of the Event <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="eventname" type="text" class="form-control" name="eventname"
                                       value="{{ old('eventname') }}" placeholder="Enter Name of Your Event" required
                                       autofocus>

                                @if ($errors->has('eventname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('eventname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('startdate') ? ' has-error' : '' }}">
                            <label for="startdate" class="col-md-4 control-label">Event Date <span
                                        style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">
                                <input id="startdate" type="date" class="form-control" name="startdate"
                                       value="{{ old('startdate') }}" placeholder="Start Date" required autofocus>

                                @if ($errors->has('startdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('startdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('event_type') ? ' has-error' : '' }}">
                            <label for="event_type" class="col-md-4 control-label">Purpose Of The Event <span style="color: red; font-size: 20px; vertical-align:middle;"></span></label>
                            <div class="col-md-6">
                                {!! Form::select('event_type', array(null => 'Select...') + $request_event_type->all(), null, ['class'=>'form-control']) !!}
                                @if ($errors->has('event_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('formAttendees') ? ' has-error' : '' }}">
                            <label for="formAttendees" class="col-md-4 control-label">Estimated Number Of Attendees<span style="color: red; font-size: 20px; vertical-align:middle;"></span> </label>
                            <div class="col-md-6">
                                <input id="formAttendees" type="text" class="form-control" name="formAttendees" value="{{ old('formAttendees') }}" placeholder="Approx. Number of Attendees" autofocus>

                                @if ($errors->has('formAttendees'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('formAttendees') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('inputvenue') ? ' has-error' : '' }}">
                            <label for="inputvenue" class="col-md-4 control-label">Event Venue or Address<span style="color: red; font-size: 20px; vertical-align:middle;"></span> </label>

                            <div class="col-md-6">
                                <input id="venue" type="text" class="form-control" name="venue" value="{{ old('venue') }}" placeholder="Place event will be held" autofocus>

                                @if ($errors->has('venue'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('venue') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('marketingopportunities') ? ' has-error' : '' }}">
                            <label for="marketingopportunities" class="col-md-4 control-label">What are the marketing opportunities? <span style="color: red; font-size: 20px; vertical-align:middle;"></span> </label>

                            <div class="col-md-6">
                                <textarea class="form-control" input id="marketingopportunities" pattern="[a-zA-Z0-9\s]"
                                          maxlength="1000" required
                                          title="Please restrict your Text Length to 1000 characters"
                                          name="marketingopportunities" rows="5"
                                          value="{{ old('marketingopportunities') }}" placeholder="MAX 1000 characters"
                                          autofocus> </textarea>

                                @if ($errors->has('marketingopportunities'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('marketingopportunities') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Send Request
                                </button>
                                <span style="color: red"> <h5> Fields Marked With (*) Are Mandatory </h5></span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#item_requested').change(function () {
            var er = document.getElementById("item_requested");
            var strRequested = er.options[er.selectedIndex].text;
            if (strRequested == 'Other (please explain)') {
                document.getElementById('item_requested_explain').style.visibility = 'visible';
            } else {
                document.getElementById('item_requested_explain').style.visibility = 'hidden';
                document.getElementById('item_requested_explain').innerText = " ";
            }
        });
        </script>
    <script>
        $('#item_purpose').change(function () {
            var ep = document.getElementById("item_purpose");
            var strPurpose = ep.options[ep.selectedIndex].text;
            if (strPurpose == 'Other (please explain)') {
                document.getElementById('item_purpose_explain').style.visibility = 'visible';
            } else {
                document.getElementById('item_purpose_explain').style.visibility = 'hidden';
                document.getElementById('item_purpose_explain').innerText = " ";
            }
        });
    </script>
@endsection
