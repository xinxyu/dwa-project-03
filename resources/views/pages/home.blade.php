@extends('layouts.master')

@section('title')
    Main | Developer's Best Friend
@stop

@section('bodyContent')
    <div id="app-description-area" class="col-xs-12 row text-center">
        <h1>Developer's Best Friend</h1>
        <p class="lead">A set of tools to aid development</p>
    </div>
    <div id="tool-description-area" class="row">
        <div class="col-md-6 col-xs-12 text-center">
            <a href="text-generator"><i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i></a>
            <a href="text-generator"><h2>Text Generator</h2></a>
            <p>Having trouble coming up with lots of text to test your page or app layouts?
                Use this text generator to get some placeholder text.</p>
        </div>
        <div class="col-md-6 col-xs-12 text-center">
            <a href="user-generator" class="tool-icon"><i class="fa fa-users fa-5x" aria-hidden="true"></i></a>
            <a href="user-generator"><h2>User Generator</h2></a>
            <p>Need user data to test your application? Use this user generator to get some mock user data.</p>
        </div>
    </div>
@stop
