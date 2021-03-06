<div class="row">
    <div class="col-2">
        <h5>Download</h5>
    </div>

    <div class="col-9">
        <a href="{{ route('data.export.file', ['type'=> $search == false ? "csv" : "csv-search"]) }}">
            <button class="btn btn-lg btn-csv margin-right-1rem">CSV</button>
        </a>
        <a href="{{ route('data.export.file', ['type'=> $search == false ? "xls" : "xls-search"]) }}">
            <button class="btn btn-lg btn-xls margin-right-1rem">XLS</button>
        </a>
        <a href="{{ route('data.export.file', ['type'=> $search == false ? "xlsx" : "xlsx-search"]) }}">
            <button class="btn btn-lg btn-xlsx margin-right-1rem">XLSX</button>
        </a>
        <a href="{{ route('data.download.images', ['type'=> $search == false ? "image" : "image-search"]) }}">
            <button class="btn btn-lg btn-jpeg margin-right-1rem">JPEG</button>
        </a>
        <a href="#">
            <button class="btn btn-lg btn-map margin-right-1rem">Map Layer</button>
        </a>
    </div>
</div>


{{--<a href="{{ route('export.file',['type'=> $search == "0" ? "csv" : "csv-search"]) }}">--}}
    {{--<button type="button" style="padding: 15px 40px" class="btn btn-default">CSV</button>--}}
{{--</a>--}}
{{--<a href="{{ route('export.file',['type'=> $search == "0" ? "xls" : "xls-search"]) }}">--}}
    {{--<button type="button" style="padding: 15px 40px" class="btn btn-default">Excel xls</button>--}}
{{--</a>--}}
{{--<a href="{{ route('export.file',['type'=> $search == "0" ? "xlsx" : "xlsx-search"]) }}">--}}
    {{--<button type="button" style="padding: 15px 40px" class="btn btn-default">Excel xlsx</button>--}}
{{--</a>--}}
{{--<button type="button" onclick="mapLayout()" style="padding: 15px 40px" class="btn btn-default">Map</button>--}}
{{--<a href="{{ url('download-image',['type'=> $search == "0" ? "image" : "image-search"]) }}">--}}
    {{--<button type="button" style="padding: 15px 40px" class="btn btn-default">JPEG</button>--}}
{{--</a>--}}

{{--<br>--}}
{{--@if($datas->items() != [])--}}
    {{--@foreach ($datas as $key=>$data)--}}
        {{--<div class="col-lg-3 col-md-4 col-xs-6">--}}
            {{--<div class="thumbnail">--}}
                {{--<a href="#" class="d-block mb-4 center-cropped">--}}
                    {{--<div class="center-cropped">--}}
                        {{--<img class="img-fluid img-thumbnail" src="{{$data->image_url}}"--}}
                             {{--alt="{{$data->image_url}}" style="z-index: 1"/>--}}
                    {{--</div>--}}
                    {{--<div class="bottom-right" style="height: 5%; width: 86%; background: {{$data->color}}";>--}}
                    {{--</div>--}}
                    {{--<div class="top-right">--}}
                        {{--@if($data->status_id == 1 )--}}
                            {{--<i class="fa fa-check-circle"></i>--}}
                        {{--@elseif ($data->status_id == 2)--}}
                            {{--<i class="fa fa-ban"></i>--}}
                        {{--@else--}}
                            {{--<i class="fa fa-question-circle"></i>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</a>--}}
                {{--<div class="caption">--}}
                    {{--<p>{{str_limit($data->description, 37)}} <br><strong>Created at:{{($data->created_at)}}</strong></p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--<div class="text-center">--}}
            {{--{{$datas->links()}}--}}
        {{--</div>--}}
        {{--@endif--}}