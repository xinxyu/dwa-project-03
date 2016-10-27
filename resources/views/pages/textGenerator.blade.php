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
        <div class="form-group col-md-3 col-xs-12">
            <label for="numberOfParagraphs">Number of Paragraphs <small>(max 20)</small></label>
            <input type="text" id="numberOfParagraphs" name="numberOfParagraphs" class="form-control" value="{{ $numberOfParagraphs }}"/>
            @if(isset($errors) && $errors->get('numberOfParagraphs'))
                <div class="error">
                    @foreach($errors->get('numberOfParagraphs') as $error)
                        <span>{{ $error }}</span><br/>
                    @endforeach
                    <span>A default of {{ $numberOfParagraphs }} was used.</span>
                </div>
            @endif
        </div>
        <div class="form-group col-md-4 col-xs-12" >
            <label class="control-label">Paragraph Length </label><br/>
            <label class="form-check-label radio-inline">
                <input type="radio" name="paragraphLength" value="Short" {{$paragraphLength == "Short"  ? "checked" : ""}}/>
                Short
            </label>
            <label class="form-check-label radio-inline">
                <input type="radio"  name="paragraphLength" value="Medium" {{ $paragraphLength == "Medium" ? "checked" : ""}} />
                Medium
            </label>
            <label class="form-check-label radio-inline">
                <input type="radio"  name="paragraphLength" value="Long" {{ $paragraphLength == "Long"  ? "checked" : ""}}/>
                Long
            </label>
            <label class="form-check-label radio-inline">
                <input type="radio"  name="paragraphLength" value="Verylong" {{ $paragraphLength == "Verylong"  ? "checked" : ""}}/>
                Very Long
            </label>
            @if(isset($errors) && $errors->get('paragraphLength'))
                <div class="error">
                    @foreach($errors->get('paragraphLength') as $error)
                        <span>{{ $error }}</span><br/>
                    @endforeach
                        <span>A default of {{ $paragraphLength }} was used.</span>
                </div>
            @endif
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
                {!! $text !!}
            </textarea>
        </div>
        <div class="col-md-1 col-xs-0"></div>
    </div>

@stop
