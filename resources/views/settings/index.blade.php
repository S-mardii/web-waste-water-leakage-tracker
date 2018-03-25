@extends('layouts.dashboard')
@section('page_heading','Setting')
@section('section')
    <style>
        .active {
            background: none;
        }

    </style>

    <ul class="nav nav-tabs" id="ulprop">
        <li class="{{$id == 1? 'active' : ''}}" onclick="getPaging(this.id)" id="1"><a data-toggle="tab" href="#status">Status</a></li>
        <li class="{{$id == 2? 'active' : ''}}" onclick="getPaging(this.id)" id="2"><a data-toggle="tab" href="#area">Area</a></li>
        <li class="{{$id == 3? 'active' : ''}}" onclick="getPaging(this.id)" id="3"><a data-toggle="tab" href="#condition">Condition</a></li>
        <li class="{{$id == 4? 'active' : ''}}" onclick="getPaging(this.id)" id="4"><a data-toggle="tab" href="#aboutus">About Us</a></li>
        <li style="margin-left: 60%"><button id="data-target" type="button" class="btn btn-info btn-lg col-xs-offset-11" data-toggle="modal"
                                             @if($id == 1)  data-target='#statusModal'  @elseif($id == 2) data-target='#areaModal' @else data-target='#conditionModal' @endif>New</button></li>
    </ul>

    <div class="tab-content mb30">
        <div id="status"class="tab-pane {{$id == 1? 'active in' : 'fade'}}">
            @include('section/status')
        </div>
        <div id="area" class="tab-pane {{$id == 2? 'active in' : 'fade'}}">
            @include('section/area')
        </div>
        <div id="condition" class="tab-pane {{$id == 3? 'active in' : 'fade'}}">
            @include('section/condition')
        </div>
        <div id="aboutus" class="tab-pane {{$id == 4? 'active in' : 'fade'}}">
            @include('section/aboutussection')
        </div>
    </div>
    {{--<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h3>Delete record confirmation</h3>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--Are you sure to delete this record?--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                    {{--<a class="btn btn-danger btn-ok">Delete</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@stop

<script type="text/javascript" >
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    function getPaging(id) {
        var element = document.getElementById('data-target');
        if (id == 1) {
            element.removeAttribute("data-target");
            element.setAttribute('data-target', "#statusModal");
        }
        else if (id == 2) {
            element.removeAttribute("data-target");
            element.setAttribute('data-target', "#areaModal");
        }
        else {
            element.removeAttribute("data-target");
            element.setAttribute('data-target','#conditionModal');
        }
        window.history.pushState("", "Water Waste", "/setting/" + id);
    }

</script>

