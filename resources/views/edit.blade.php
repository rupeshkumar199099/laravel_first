@include('header');


<div class="col-lg-6 offset-3">
    <h1 class="text-center mb-4">Edit Details</h1>
    <form method="POST" action="/edit">
        @csrf
        @foreach($data as $item)
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Name</label>
          <input type="hidden" class="form-control" value="{{ $item->id }}" name="update_id">
          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $item->name }}" name="name">
          <span style="color: red;">
            @error('name')
              {{ $message; }}
            @enderror
        </span>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $item->email }}" name="email">
          <span style="color: red;">
            @error('email')
              {{ $message; }}
            @enderror
        </span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Phone No</label>
          <input type="tel" class="form-control @error('phone_no') is-invalid @enderror" maxlength="10" minlength="10" value="{{ $item->contact_no }}" name="phone_no">
          <span style="color: red;">
            @error('phone_no')
              {{ $message; }}
            @enderror
        </span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Message</label>
          <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="" rows="3">{{ $item->message }}</textarea>
          <span style="color: red;">
            @error('message')
              {{ $message; }}
            @enderror
        </span>
        </div>
       @endforeach
       <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>