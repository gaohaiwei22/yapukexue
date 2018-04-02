
<form action="" method="post" id="nodelistform" onsubmit="return false" class="form-inline">
<input type="hidden" name="rid" value="{{ $rid }}"/>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@foreach($nodelist as $vo)
    <div class="checkbox" style="width:140px;height:35px;">
        <label>
        <input type="checkbox" name="nids[]" value="{{ $vo->id }}" {{ in_array($vo->id,$nids)?"checked":"" }}> {{ $vo->name }}
        </label>
    </div>
@endforeach
</form>