<div class="mb-3">
    <label for="{{$lable}}" class="col-form-label"
      >{{$lable}}</label>
    <input
      type="{{$type}}"
      class="form-control"
      id="{{$name}}"
      name="{{$name}}"
      placeholder="{{$holder}}"
    />
    <span class="text-danger" style="font-size:12px">
      @error($name)
          *{{$message}}
      @enderror
    </span>
</div>
