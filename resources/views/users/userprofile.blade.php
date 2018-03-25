@extends('layouts.dashboard')
@section('page_heading','User Profile')
@section('section')
    <div class="row" style="margin-left: -120px">
        <div class="col-md-12">
            <form method="post" action="{{url('/user/update')}}">
                {{csrf_field()}}
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Name</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="name" name="name" class="form-control" value="{{$users->name}}">
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-2 control-label" for="description">Phone</label>--}}
                        {{--<div class="col-sm-10">--}}
                            {{--<input type="text" name="phone" placeholder="phone" class="form-control" value="{{$users->phone}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Email</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="email" name="email" class="form-control" value="{{$users->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Password</label>
                        <div class="col-sm-10">
                            <input type="password" placeholder="Leave blank if you don't need to change password" name="password" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Re-Password</label>
                        <div class="col-sm-10">
                            <input type="password" placeholder="Repeat password" name="repassword" class="form-control">
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
