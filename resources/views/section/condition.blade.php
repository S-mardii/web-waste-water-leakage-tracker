{{--<button type="button" class="btn btn-info btn-lg col-xs-offset-11" data-toggle="modal" data-target="#conditionModal">New</button>--}}
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Condition</th>
        <th>Color</th>
        <th style="padding-left: 20%;">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($conditions as $key => $condition)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$condition->condition}}</td>
                <td style="height: 5%; width: 5%; background: {{$condition->color}}"></td>
                <td style="padding-left: 20%;">
                    <i onclick="editCondition({{$condition}})" class="fa fa-edit" style="margin-left: 5px; font-size: 20px" title="edit"></i>
                    {{--<a href="{{ url('setting/condition/delete').'/'.$condition->id}}"><i class="fa fa-trash" style="margin-left: 5px; color: red; font-size: 20px" title="delete"></i></a>--}}
                    <a href="#" data-href="{{ url('setting/condition/delete').'/'.$condition->id}}" data-toggle="modal" data-target="#confirm-delete-condition"><i class="fa fa-trash" style="margin-left: 5px; color: red; font-size: 20px" title="delete"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align: center">
    <?php echo $conditions->render(); ?>
</div>
<div class="modal fade" id="conditionModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <form class="form-inline" method="post" action="{{url('/setting/condition/create')}}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Condition</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="status" class="sr-only">Condition</label>
                        <input type="hidden" name="conditionvalue" id="conditionvalue">
                        <input type="hidden" name="conditionvalueid" id="conditionvalueid">
                        <input type="text" name="condition" class="form-control" id="conditionval" placeholder="condition">
                        <input type="color" name="color" id="colorcode" value="#000000">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" value="Create" id="updatecondition">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="confirm-delete-condition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    $('#confirm-delete-condition').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    function editCondition(data) {
        $("#conditionModal").modal();
        var input = document.getElementById('condition');
        input.value = data.condition;
        console.log(data.condition);
        document.getElementById("conditionval").setAttribute('value',data.condition);
        document.getElementById("conditionvalueid").setAttribute('value',data.id);
        document.getElementById("updatecondition").value="Update";
        document.getElementById("colorcode").value=data.color;
    }
</script>