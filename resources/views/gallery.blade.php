{{-- @include('layout'); --}}
@include('header');

<style>
    .type {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 2em;
    }

    .type a {
        margin: 10px;
    }

    .imgStyle {
        margin: 10px;
        border-radius: 5px;
        box-shadow: 5px 10px 5px 5px rgb(234, 171, 171);
        /* filter: drop-shadow(5px 5px 10px rgba(217, 129, 129, 0.5)); */
    }

    .pb-40 {
        padding-bottom: 40px;
    }

    .pt-40 {
        padding-top: 40px;
    }
    button a{
        color: #ffffff;
        text-decoration: none;
    }
</style>
<section class="pb-40 pt-40">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <script>
                    setTimeout(function() {
                        document.getElementById('success').remove();
                    }, 3000);
                </script>
                @if (session('message'))
                    <p class="text-center" id="success"
                        style="background-color:green; color: white; padding:5px 10px;">
                        {{ session('message') }}</p>
                @endif
                <h2 class="text-center">Gallery Image</h2>
                <div class="type">
                    <div class="typeText">
                        <a href="{{ route('show-image') }}" class="btn btn-primary">
                            All
                        </a>
                    </div>
                    <div class="typeText">
                       <a href="{{ route('show-image', ['id' => '1']) }}" class="btn btn-success">Class</a>
                    </div>
                    <div class="typeText">
                       <a href="{{ route('show-image', ['id' => '2']) }}" class="btn btn-warning">Sports</a>
                    </div>
                    <div class="typeText">
                       <a href="{{ route('show-image', ['id' => '3']) }}" class="btn btn-secondary">Educational</a>
                    </div>
                    <div class="typeText">
                       <a href="{{ route('show-image', ['id' => '4']) }}" class="btn btn-success">Festival</a>
                    </div>
                    <div class="typeText">
                       <a href="{{ route('show-image', ['id' => '5']) }}" class="btn btn-primary">Tour & Travel</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          @foreach ($Gdata as $index => $data)
              @if ($index % 4 == 0)
                  </div><div class="row">
              @endif
              <div class="col-lg-3 type">
                  <div class="imgStyle">
                      <img src="{{ asset('storage/Gallery/' . $data->image) }}" alt="" height="200px" width="100%">
                  </div>
              </div>
          @endforeach
      </div>      

    </div>
</section>
{{-- @endsection --}}
