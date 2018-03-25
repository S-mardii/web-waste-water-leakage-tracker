@extends('layouts.dashboard')
@section('page_heading','Report Detail')
@section('section')
    <div class="row" style="margin-left: -120px">
        <div class="col-md-12">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">ID</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="id" class="form-control" value="{{$user->id}}">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Name</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="area" class="form-control" value="{{$user->name}}">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="description">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="area" class="form-control" value="{{$user->phone}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        <a href="{{ url('poster')}}"><button type="button" class="btn btn-primary control-label">Back</button></a>
                    </label>
                </div>
            </form>
        </div>
    </div>
@stop
