<form role="form" method="post" action="">
    {{ csrf_field() }}

    <div class="form-row">
        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">From</span>
                </div>
                <input type="date" class="form-control" name="from" id="from" title="from" aria-describedby="inputGroupPrepend2">
            </div>
        </div>

        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">To</span>
                </div>
                <input type="date" class="form-control" name="to" id="to" title="to" aria-describedby="inputGroupPrepend2">
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </div>
</form>