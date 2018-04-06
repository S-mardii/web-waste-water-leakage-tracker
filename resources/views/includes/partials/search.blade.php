{{ csrf_field() }}

<div class="form-row">
    <div class="col">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">From</span>
            </div>
            <input type="date" class="form-control" value="{{ $from or '' }}" name="from" id="from" title="From date" aria-describedby="inputGroupPrepend2" required>
        </div>
    </div>

    <div class="col">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">To</span>
            </div>
            <input type="date" class="form-control" value="{{ $to or '' }}" name="to" id="to" title="To date" aria-describedby="inputGroupPrepend2" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
</div>