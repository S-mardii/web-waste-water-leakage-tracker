{{--<button type="button" class="btn btn-info btn-lg col-xs-offset-11" data-toggle="modal" data-target="#statusModal">New</button>--}}
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($status as $key => $statusdata)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$statusdata->status}}</td>
            <td>
                <i onclick="edit({{$statusdata}})" class="fa fa-edit" style="margin-left: 5px; font-size: 20px" title="edit"></i>
{{--                <a href="{{ url('setting/status/delete').'/'.$statusdata->id}}"><i class="fa fa-trash" style="margin-left: 5px; color: red; font-size: 20px" title="delete"></i></a>--}}
                <a href="#" data-href="{{ url('setting/status/delete').'/'.$statusdata->id}}" data-toggle="modal" data-target="#confirm-delete-status"><i class="fa fa-trash" style="margin-left: 5px; color: red; font-size: 20px" title="delete"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div style="text-align: center">
    <?php echo $status->render(); ?>
</div>
<div class="modal fade" id="statusModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <form class="form-inline" method="post" action="{{url('/setting/status/create')}}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Status</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="status" class="sr-only">Status</label>
                        <input type="hidden" name="editedvalueid" id="editedvalueid">
                        <input type="text" name="status" class="form-control" id="statusvalue" placeholder="status">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" value="Create" id="submitbtn">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="confirm-delete-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    $('#confirm-delete-status').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    function edit(data) {
        $("#statusModal").modal();
        var input = document.getElementById('status');
        input.value = data.status;
        document.getElementById("statusvalue").setAttribute('value',data.status);
        document.getElementById("editedvalueid").setAttribute('value',data.id);
        document.getElementById("submitbtn").value="Update";
    }
</script>