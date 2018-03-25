@extends('layouts.dashboard')
@section('page_heading','Report Detail')

<style>
    .margin-left-128px {
        margin-left: 15%;
    }
</style>

@section('section')
    <div class="row" style="margin-left: -120px">
        <div class="col-md-12">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">ID</label>
                    <div class="col-sm-10">
                        <h4><b>{{$post->id}}</b></h4>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Area</label>
                    <div class="col-sm-10">
                        <h4><b>{{$post->area}}</b></h4>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="description">Description</label>
                    <div class="col-sm-10">
                        <h4><b>{{$post->description}}</b></h4>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Poster ID</label>
                    <div class="col-sm-10">
                        <h4><b>{{$post->poster_id}}</b></h4>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Conditon</label>
                    <div class="col-sm-10">
                        <h4><b>{{$post->condition}}</b></h4>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Latitude</label>
                    <div class="col-sm-10">
                        <h4><b>{{$post->lat}}</b></h4>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Longitude</label>
                    <div class="col-sm-10">
                        <h4><b>{{$post->lng}}</b></h4>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Status</label>
                    <div class="col-sm-10">
                        <h4><b>{{$post->status}}</b></h4>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Image</label>
                    <div class="col-sm-10">
                        <img src="{{url($post->image_url)}}" alt="{{$post->image_url}}" width="300" height="200">
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-2 control-label">--}}
                        {{--<a href="{{ url('report')}}">--}}
                            {{--<button type="button" class="btn btn-primary control-label">Back</button>--}}
                        {{--</a>--}}
                    {{--</label>--}}
                {{--</div>--}}
            </form>
        </div>
        <div class="col-md-12">
            {{--<label class="col-sm-2 control-label">--}}
            <div class="col-sm-8 margin-left-128px">
                <div class="col-md-1">
                    <form method="post"  role="form" action="{{url("report/like")}}">
                        {{csrf_field()}}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button type="submit" name="like" value="{{$isliked == null ? "1" : "0"}}"
                                class="btn {{ ($isliked == null ? " btn-default " : " btn-success ") }} control-label">
                            {{$getlike}} Like
                        </button>
                    </form>
                </div>
                <div class="col-md-1">
                    <form method="post" role="form" action="{{url("report/dislike")}} ">
                        {{csrf_field()}}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button type="submit" name="dislike" value="{{$isdisliked == null ? "1" : "0"}}"
                                class="btn {{ ($isdisliked == null ? " btn-default " : " btn-danger ") }} control-label">
                            {{$getdislike}} Dislike
                        </button>
                    </form>
                </div>
            </div>
            {{--</label>--}}
        </div>
    </div>

    <div class="comments-container margin-button">
        <h1>Comment</h1>
        <form class="form-inline" role="form" method="POST" action="/report/show">
            {{csrf_field()}}
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <input class="form-control" name="comment" style="width: 500px;" type="text"
                       placeholder="Your comments"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
        <ul id="comments-list" class="comments-list">
            @foreach($comments as $comment)
                <li style="margin-bottom: 2%">
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img
                                    src="{{url("logo/user.png")}}"
                                    alt="">
                        </div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name ">{{$comment->name}} ({{$comment->role}}) </h6>
                                <span>{{$comment->created_at}}</span>
                                {{--<i class="fa fa-reply"></i>--}}
                                {{--<i class="fa fa-heart"></i>--}}
                            </div>
                            <div class="comment-content">
                                {{$comment->comment}}
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@stop
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    a {
        color: #03658c;
        text-decoration: none;
    }

    ul {
        list-style-type: none;
    }

    .margin-button {
        margin-bottom: 60px;
    }

    body {
        font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
        background: #dee1e3;
    }

    .comments-container {
        margin-left: 40px;
        width: 768px;
    }

    .comments-container h1 {
        font-size: 36px;
        color: #283035;
        font-weight: 400;
    }

    .comments-container h1 a {
        font-size: 18px;
        font-weight: 700;
    }

    .comments-list {
        margin-top: 30px;
        position: relative;
    }

    .reply-list:before, .reply-list:after {
        display: none;
    }

    .comments-list li:after {
        content: '';
        display: block;
        clear: both;
        height: 0;
        width: 0;
    }

    .reply-list {
        padding-left: 88px;
        clear: both;
        margin-top: 15px;
    }

    /**
     * Avatar
     ---------------------------*/
    .comments-list .comment-avatar {
        width: 65px;
        height: 65px;
        position: relative;
        z-index: 99;
        float: left;
        border: 3px solid #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .comments-list .comment-avatar img {
        width: 100%;
        height: 100%;
    }

    .reply-list .comment-avatar {
        width: 50px;
        height: 50px;
    }

    .comment-main-level:after {
        content: '';
        width: 0;
        height: 0;
        display: block;
        clear: both;
    }

    .comments-list .comment-box {
        width: 680px;
        float: right;
        position: relative;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
    }

    .reply-list .comment-box {
        width: 610px;
    }

    .comment-box .comment-head {
        background: #FCFCFC;
        padding: 10px 12px;
        border-bottom: 1px solid #E5E5E5;
        overflow: hidden;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
    }

    .comment-box .comment-head i {
        float: right;
        margin-left: 14px;
        position: relative;
        top: 2px;
        color: #A6A6A6;
        cursor: pointer;
        -webkit-transition: color 0.3s ease;
        -o-transition: color 0.3s ease;
        transition: color 0.3s ease;
    }

    .comment-box .comment-head i:hover {
        color: #03658c;
    }

    .comment-box .comment-name {
        color: #283035;
        font-size: 14px;
        font-weight: 700;
        float: left;
        margin-right: 10px;
    }

    .comment-box .comment-name a {
        color: #283035;
    }

    .comment-box .comment-head span {
        float: left;
        color: #999;
        font-size: 13px;
        position: relative;
        top: 1px;
    }

    .comment-box .comment-content {
        background: #FFF;
        padding: 12px;
        font-size: 15px;
        color: #595959;
        -webkit-border-radius: 0 0 4px 4px;
        -moz-border-radius: 0 0 4px 4px;
        border-radius: 0 0 4px 4px;
    }

    .comment-box .comment-name.by-author:after {
        content: 'autor';
        background: #03658c;
        color: #FFF;
        font-size: 12px;
        padding: 3px 5px;
        font-weight: 700;
        margin-left: 10px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    /** =====================
     * Responsive
     ========================*/
    @media only screen and (max-width: 766px) {
        .comments-container {
            width: 480px;
        }

        .comments-list .comment-box {
            width: 390px;
        }

        .reply-list .comment-box {
            width: 320px;
        }
    }
</style>
