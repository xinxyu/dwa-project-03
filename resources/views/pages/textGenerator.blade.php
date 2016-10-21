@extends('layouts.master')

@section('title')
    Text Generator | Code Crony
@stop

@section('bodyContent')
    <div class="text-center">
        <h1>Text Generator</h1>
    </div>

        <form method="POST" action="/text-generator">
            {{csrf_field()}}
            <div class="form-group col-md-2">
                <label for="pNum">Number of Paragraphs</label>
                <input type="text" id="pNum" name="pNum" class="form-control"/>
            </div>
            <div class="form-group col-md-3">
            <label>Paragraph Length </label><br/>
                    <label class="form-check-label radio-inline">
                        <input type="radio" class="form-check-input" name="pLength" value="short"/>
                        Short
                    </label>
                    <label class="form-check-label radio-inline">
                        <input type="radio" class="form-check-input" name="pLength" value="medium"/>
                        Medium
                    </label>
                    <label class="form-check-labe radio-inline">
                        <input type="radio" class="form-check-input" name="pLength" value="long"/>
                        Long
                    </label>
            </div>
        </form>

@stop
