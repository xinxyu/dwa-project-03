@extends('layouts.master')

@section('title')
    Text Generator | Code Crony
@stop

@section('headContent')
    <script>
        $(document).ready(function(){

        new Clipboard('#copy-button');

        });
    </script>
@stop

@section('bodyContent')
    <div class="page-header text-center">
        <h1>Text Generator</h1>
    </div>

    <form method="POST" action="/text-generator" class="form-inline row" >
        {{csrf_field()}}
        <div class="col-md-1 col-xs-0"></div>
        <div class="form-group col-md-2 col-xs-12">
            <label for="pNum">Number of Paragraphs</label>
            <input type="text" id="pNum" name="pNum" class="form-control" value="{{ isset($pNum)  ? $pNum : 5}}"/>
        </div>
        <div class="form-group col-md-4 col-xs-12" >
            <label class="control-label">Paragraph Length </label><br/>
            <label class="form-check-label radio-inline">
                <input type="radio" name="pLength" value="short" {{ isset($pLength) && $pLength == "short"  ? "checked" : ""}}/>
                Short
            </label>
            <label class="form-check-label radio-inline">
                <input type="radio"  name="pLength" value="medium" {{ (isset($pLength) && $pLength == "medium") || !isset($pLength)  ? "checked" : ""}} />
                Medium
            </label>
            <label class="form-check-label radio-inline">
                <input type="radio"  name="pLength" value="long" {{ isset($pLength) && $pLength == "long"  ? "checked" : ""}}/>
                Long
            </label>
            <label class="form-check-label radio-inline">
                <input type="radio"  name="pLength" value="verylong" {{ isset($pLength) && $pLength == "verylong"  ? "checked" : ""}}/>
                Very Long
            </label>
        </div>
        <div class="form-group col-md-3 col-xs-12" role="group">
            <br/>
            <button type="submit" class="btn btn-default btn-primary">Generate Text</button>
            <button id="copy-button" type="button" class="btn btn-default btn-secondary" data-clipboard-action="copy" data-clipboard-target="#text-area">
                Copy to Clipboard
            </button>
        </div>

        <div class="col-md-1 col-xs-0"></div>
    </form>

    <div id="text-container">
        <div class="col-md-1 col-xs-0"></div>
        <div class="col-md-10 col-xs-12 form-group">
            <textarea id="text-area" class="form-control">
                {!! isset($text) ? $text : Lipsum::medium()->text(5) !!}
            </textarea>
        </div>
        <div class="col-md-1 col-xs-0"></div>
    </div>

@stop
