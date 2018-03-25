@extends('layouts.dashboard')
@section('page_heading','Report Detail')
@section('section')
    {{--{{dd($post['condition'])}}--}}
    {{--{{dd($conditions)}}--}}
            <div class="row" style="margin-left: 0px">
                <div class="col-md-12">
                    {{--{!! BootForm::open(array('url' => '/report/update/'))!!}--}}
                    <form method="post" action="{{url('/report/update')}}">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">ID</label>
                                {{csrf_field()}}
                                <div class="col-sm-10">
                                    <input type="text" placeholder="id" name="id" class="form-control" readonly value="{{$post->id}}">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Area</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="area" name="area_id" readonly class="form-control" value="{{$post->area_id}}">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="description" rows="5" name="description">{{$post->description}}</textarea>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Poster ID</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly placeholder="poster id" name="poster_id" class="form-control" value="{{$post->poster_id}}">
                                </div>
                            </div>
                            <input type="hidden" name="img_url" value="{{($post->image_url)}}">
                            {{--{{dd($conditions)}}--}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Condition</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm" style="width: 20%" name="condition_id">
                                        <?php $number = 1; ?>
                                        @foreach($conditions as $condition)
                                            <option value="{{$number++}}" {{$post['condition'] === $condition->condition ? 'selected' : ''}}>{{$condition->condition}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--{{dd($post['status'])}}--}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm" style="width: 20%" name="status">
                                        <?php $number = 1; ?>
                                        @foreach($statuss as $status)
                                            <option value="{{$number++}}" {{$post['status']== $status->status ? 'selected' : ''}}>{{$status->status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Latitude</label>
                                <div class="col-sm-4">
                                    <input type="text" readonly name="lat" placeholder="State" class="form-control" value="{{$post->lat}}">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Longitude</label>
                                <div class="col-sm-4">
                                    <input type="text" readonly name="lng" placeholder="Post Code" class="form-control" value="{{$post->lng}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Image</label>
                                <div class="col-sm-10">
                                    <img src="{{url($post->image_url)}}" alt="{{$post->image_url}}" width="300" height="200">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style="margin-left: 160px">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('report')}}"><button type="button" class="btn btn-default control-label">Back</button></a>
                                </label>
                            </div>

                        </div>
                    </form>
{{--                    {!! BootForm::close() !!}--}}
                </div>
            </div>



@stop
