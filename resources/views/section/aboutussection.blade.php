<form method="post" action="{{url('/setting/aboutus/create')}}">
      {{csrf_field()}}
      <div class="form-group">
        <h3>About us</h3>
        <textarea class="form-control" name="aboutus" rows="4">{{$aboutus['aboutus']}}</textarea>
      </div>
      <div class="form-group">
          <h3>Disclaimer</h3>
          <textarea class="form-control" name="disclaimer" rows="4">{{$aboutus['disclaimer']}}</textarea>
      </div>
      <input class="btn btn-primary" type="submit" value="Update" id="updatecondition">
</form>


