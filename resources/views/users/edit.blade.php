@extends('layouts.dashboard')
@section('page_heading','Report Detail')
@section('section')
    <div class="row" style="margin-left: -120px">
        <div class="col-md-12">
            <form method="post" action="{{url('/poster/update')}}">
                {{csrf_field()}}
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">ID</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="id" name="id" class="form-control" value="{{$user->id}}">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Name</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="name" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" placeholder="phone" class="form-control" value="{{$user->phone}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="margin-left: 160px">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('poster')}}"><button type="button" class="btn btn-default control-label">Back</button></a>
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
