@include('header');

<div class="col-lg-6 offset-3">
    <h2 class="text-center mb-4">Add Gallery Image</h2>
   
    <form method="POST" action="/add-img" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Image Type</label>
          <select name="type" id="" class="form-control @error('type') is-invalid @enderror">
            <option disabled selected value="0">---- SELECT ANY ONE ----</option>
            <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Class</option>
            <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>Sports</option>
            <option value="3" {{ old('type') == '3' ? 'selected' : '' }}>Educational</option>
            <option value="4" {{ old('type') == '4' ? 'selected' : '' }}>Festival</option>
            <option value="5" {{ old('type') == '5' ? 'selected' : '' }}>Tour & Travel</option>
          </select>
          <span style="color: red;">
            @error('type')
              {{ $message;}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label ">Image</label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
          <span style="color: red;">
            @error('image')
              {{ $message;}}
            @enderror
          </span>
        </div>
        {{-- <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label ">Description</label>
          <textarea name="descri" id="descri" cols="30" rows="10" class="form-control @error('descri') is-invalid @enderror" >{{ old('descri') }}</textarea>
          <span style="color: red;">
            @error('descri')
              {{ $message;}}
            @enderror
          </span>
        </div> --}}
       
        <button type="submit" class="btn btn-primary">Add Image</button>
      </form>
</div>

