@extends('layouts.dashboard')
@section('page_heading','Report')
@section('section')
    <table class="table table-hover">
        <thead style="text-align: center">
        <th>#</th>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created</th>
        </thead>
        <tbody>

        @if($i = 1)@endif
        @foreach($datas as $data)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                {{--{{$post['condition'] === $condition->condition ? 'selected' : ''}}--}}
                <td>
                    <select class="form-control form-control-sm" style="width: 50%" name="role_id"
                            onchange="getId({
                                id : this.options[this.selectedIndex].id,
                                value : this.options[this.selectedIndex].value
                            })">
                        <?php $number = 1; ?>
                        @foreach($roles as $role)
                            <option value="{{$number++}}" id="{{$data->id}}"
                                    {{$data->role === $role->role ? 'selected' : ''}}>{{$role->role}}</option>
                        @endforeach
                    </select>
                </td>
                <td>{{$data->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{$datas->links()}}
    </div>
@stop

<script type="text/javascript">

    function getId(data) {
        var user_id = data.id;
        var role_id = data.value;

        $.get( "user/role",  { user_id: user_id , role_id: role_id })
            .done(function(data) {
                alert( "Role has been Updated" );
            })
            .fail(function(error) {
                alert( error );
            })
            .always(function() {

            });
    }



</script>
