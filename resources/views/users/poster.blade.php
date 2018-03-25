@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')

    <table class="table table-hover">
        <thead>
            <th>#</th>
            <th>ID</th>
            <th>Name</th>
            <th>phone</th>
            <th>Register</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if($i=1)@endif

            @foreach($datas as $data)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        <a href="{{ url('poster/show').'/'.$data->id}}"><i class="fa fa-eye" title="show" style="font-size: 20px"></i></a>
                        <a href="{{ url('poster/edit').'/'.$data->id}}"><i class="fa fa-edit" style="margin-left: 5px; font-size: 20px" title="edit"></i></a>
                        <a href="{{ url('poster/delete').'/'.$data->id}}"><i class="fa fa-trash" style="margin-left: 5px; color: red; font-size: 20px" title="delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop