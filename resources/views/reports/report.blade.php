@extends('layouts.dashboard')
@section('page_heading','Report')
@section('section')
    <table class="table table-hover">
        <thead style="text-align: center">
        <th>#</th>
        <th>id</th>
        <th>Area</th>
        <th>Description</th>
        <th>Poser_id</th>
        <th>Image</th>
        <th>Date</th>
        <th>Status</th>
        <th>Condition</th>
        <th>Action</th>
        </thead>
        <tbody>

        @if($i = 1)@endif
        @foreach($datas as $data)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$data->id}}</td>
                <td>{{$data->area}}</td>
                <td>{{str_limit($data->description, 30)}}</td>
                <td>{{$data->poster_id}}</td>
                <td>
                    <img src="{{url($data->image_url)}}" width="50" height="50">
                </td>
                <td>{{$data->created_at}}</td>
                <td> {{$data->status}}</td>
                <td> {{$data->condition}}</td>
                <td>
                    <a href="{{ url('report/show').'/'.$data->id}}"><i class="fa fa-eye" title="show"
                                                                       style="font-size: 20px"></i></a>
                    @if(Auth::user()->role_id < 3)
                        <a href="{{ url('report/delete').'/'.$data->id}}"><i class="fa fa-edit"
                                                                           style="margin-left: 5px; font-size: 20px"
                                                                           title="edit"></i></a>
                   
                    @endif

                    @if (Auth::user()->role_id ==1)
                        <a href="#" data-href="{{ url('report/delete').'/'.$data->id}}" data-toggle="modal" data-target="#confirm-delete-post"><i class="fa fa-trash"
                                                                             style="margin-left: 5px; color: red; font-size: 20px"
                                                                             title="delete"></i></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody><div class="modal fade" id="confirm-delete-post" tabindex="-1" role="dialog" aria-labelledby="deletepost" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Delete record confirmation</h3>
                    </div>
                    <div class="modal-body">
                        Are you sure to delete this record?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#confirm-delete-post').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        </script>

    </table>
    <div class="text-center">
        {{$datas->links()}}
    </div>
@stop
