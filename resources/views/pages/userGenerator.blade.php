@extends('layouts.master')

@section('title')
    User Generator | Code Crony
@stop

@section('bodyContent')
    <div class="page-header text-center">
        <h1>User Generator</h1>
    </div>

    <form method="POST" action="/user-generator"  >
        {{csrf_field()}}

        <div class="form-group col-md-4 col-xs-12 col-md-offset-4">
            <label for="numberOfUsers">Number of Users <small>(max 20)</small></label>
            <input type="text" id="numberOfUsers" name="numberOfUsers" class="form-control" value="{{ $numberOfUsers }}"/>
            @if(isset($errors) && $errors->get('numberOfUsers'))
                <div class="error">
                    @foreach($errors->get('numberOfUsers') as $error)
                        <span>{{ $error }}</span><br/>
                    @endforeach
                    <span>A default of {{ $numberOfUsers }} was used.</span>
                </div>
            @endif
        </div>
        <div class="form-group col-md-12 col-xs-12 col-md-offset-4" >
            <label class="control-label">Gender of Users</label><br/>
            <label class="form-check-label radio-inline">
                <input type="radio" name="gender" value="Male" {{ $gender == "Male"  ? "checked" : ""}}/>
                Male
            </label>
            <label class="form-check-label radio-inline">
                <input type="radio"  name="gender" value="Female" {{ $gender == "Female" ? "checked" : "" }} />
                Female
            </label>
            <label class="form-check-label radio-inline">
                <input type="radio"  name="gender" value="Mixed" {{ $gender == "Mixed"  ? "checked" : "" }}/>
                Mixed
            </label>
            @if(isset($errors) && $errors->get('gender'))
                <div class="error">
                    @foreach($errors->get('gender') as $error)
                        <span>{{ $error }}</span><br/>
                    @endforeach
                    <span>A default of {{ $gender }} was used.</span>
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-default btn-primary col-md-4 col-md-offset-4 col-xs-12">Generate Users</button>



    </form>


    <div id="user-data-container">
        <div class="col-xs-12">
            <h3>Users</h3>
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#text" aria-controls="text" role="tab" data-toggle="tab">Text</a></li>
                <li role="presentation"><a href="#json" aria-controls="json" role="tab" data-toggle="tab">JSON</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="text">
                    @foreach($randomUsers as $user)
                        <div class="user-card col-md-6">
                            <h4>{{ $user["firstName"] }} {{ $user["lastName"] }}</h4>
                            <div>Gender: {{ $user["gender"]}}</div>
                            <div>Birthday: {{ $user["birthday"]->format('m/d/Y') }}</div>
                            <div>Phone Number: {{ $user["phoneNumber"] }}</div>
                            <div>Email: {{ $user["emailAddress"] }}</div>
                        </div>
                    @endforeach

                </div>
                <div role="tabpanel" class="tab-pane" id="json" >
                    <pre>{{ json_encode($randomUsers,JSON_PRETTY_PRINT) }}</pre>
                </div>
            </div>

        </div>
    </div>
@stop
