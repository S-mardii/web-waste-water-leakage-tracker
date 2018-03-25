{{--<button type="button" class="btn btn-info btn-lg col-xs-offset-11" data-toggle="modal" data-target="#areaModal">New</button>--}}
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Area</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($areas as $key =>$area)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$area->area}}</td>
            <td>
                <i onclick="editArea({{$area}})" class="fa fa-edit" style="margin-left: 5px; font-size: 20px" title="edit"></i>
{{--                <a href="{{ url('setting/area/delete').'/'.$area->id}}"><i class="fa fa-trash" style="margin-left: 5px; color: red; font-size: 20px" title="delete"></i></a>--}}
                <a href="#" data-href="{{ url('setting/area/delete').'/'.$area->id}}" data-toggle="modal" data-target="#confirm-delete-area"><i class="fa fa-trash" style="margin-left: 5px; color: red; font-size: 20px" title="delete"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div style="text-align: center">
    <?php echo $areas->render(); ?>
</div>
<div class="modal fade" id="areaModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <form class="form-inline" method="post" action="{{url('/setting/area/create')}}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Area</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="status" class="sr-only">Area</label>
                        <input type="hidden" name="areavalueid" id="areavalueid">
                        <input type="text" name="area" class="form-control" id="areaval" placeholder="area">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" value="Create" id="updatestatus">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="confirm-delete-area" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    $('#confirm-delete-area').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    function editArea(data) {
        $("#areaModal").modal();
        var input = document.getElementById('area');
        input.value = data.area;
        document.getElementById("areaval").setAttribute('value',data.area);
        document.getElementById("areavalueid").setAttribute('value',data.id);
        document.getElementById("updatestatus").value="Update";
    }
</script>