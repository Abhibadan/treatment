<div class="mb-3">
    <label for="name" class="col-form-label"
      >{{$lable}} <i class="fas fa-user-circle"></i
    ></label>
    <input
      type="file"
      class="form-control"
      id="{{$name}}"
      name="{{$name}}"
      accept="image/*"
    />
    <span class="text-danger" style="font-size:12px">
      @error($name)
          *{{$message}}
      @enderror
    </span>
</div>