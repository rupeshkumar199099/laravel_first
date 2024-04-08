@include('header');
<style>
  #map{
    height: 400px;
  }
</style>

<div class="col-lg-6 offset-3">
    <h1 class="text-center mb-4">Contact Us</h1>
    {{-- <ul>
    @foreach($errors->all() as $e)
      <li>{{ $e }}</li>
    @endforeach
    </ul> --}}
    <form method="POST" action="/contact">
        @csrf
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name">
          <span style="color: red;">
            @error('name')
              {{ $message;}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label ">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" name="email" >
          <span style="color: red;">
            @error('email')
              {{ $message;}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Phone No</label>
          <input type="tel" class="form-control @error('phone_no') is-invalid @enderror" maxlength="10" minlength="10"  value="{{ old('phone_no') }}" name="phone_no">
          <span style="color: red;">
            @error('phone_no')
              {{ $message;}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Message</label>
          <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="" rows="3">{{ old('message') }}</textarea>
          <span style="color: red;">
            @error('message')
              {{ $message;}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Point Your Location</label><br>
          <label for="exampleInputPassword1" class="form-label">Latitude</label>
          <input type="number" class="form control @error('message') is-invalid @enderror" value="{{ old('latitude') }}" name="latitude" id="latitude" readonly>
          <span style="color:red;">
            @error('message')
            {{ $message; }}
            @enderror
          </span><br>
          <label for="exampleInputPassword1" class="form-label">Longitude</label>
          <input type="number" class="form control @error('message') is-invalid @enderror" value="{{ old('longitude') }}" name="longitude" id="longitude" readonly>
          <span style="color:red;">
            @error('message')
            {{ $message; }}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <div id="map"></div>
        </div>
       
        <button type="submit" class="btn btn-primary">Send Query</button>
      </form>
</div>
<div class="col-12 mt-4">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14652.389139777368!2d85.32395955!3d23.34848975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1711911648971!5m2!1sen!2sin" width="100%" height="400" frameborder="0"></iframe>
</div>

<script>



let map;
let infoWindow;
var lat2=23.9925;
var long2=85.3637;
async function initMap() {
    const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    map = new Map(document.getElementById("map"), {
        center: { lat: lat2, lng: long2 },
        zoom: 14,
        mapId: "4504f8b37365c3d0",
    });
    // alert(Latbyblock);
    infoWindow = new InfoWindow();
     draggableMarker2 = new google.maps.Marker({
        map: map,
        position: { lat: lat2, lng: long2 },
        draggable: true,
        title: "You can drag the marker to set at your home location.",
    });
    // document.getElementById("latitude").value = 23.350682141131426;
    // document.getElementById("longitude").value = 85.31989981984727;
    google.maps.event.addListener(draggableMarker2, "dragend", (event) => {
        const position = draggableMarker2.getPosition();
        document.getElementById("latitude").value = position.lat();
        document.getElementById("longitude").value = position.lng();
        console.log("Marker dragged to:", position.lat(), position.lng());
        infoWindow.close();
        infoWindow.setContent(`Pin dropped at: ${position.lat()}, ${position.lng()}`);
        infoWindow.open(map, draggableMarker2);
    });
}

function toggleMapMode() {
    const currentMapTypeId = map.getMapTypeId();
    const newMapTypeId = currentMapTypeId === 'roadmap' ? 'satellite' : 'roadmap';
    map.setMapTypeId(newMapTypeId);
}
(async (g) => {
    var h,
        a,
        k,
        p = "The Google Maps JavaScript API",
        c = "google",
        l = "importLibrary",
        q = "__ib__",
        m = document,
        b = window;
    b = b[c] || (b[c] = {});
    var d = b.maps || (b.maps = {}),
        r = new Set(),
        e = new URLSearchParams(),
        u = () =>
        h ||
        (h = new Promise(async (f, n) => {
            await (a = m.createElement("script"));
            e.set("libraries", [...r] + "");
            for (k in g) e.set(k.replace(/[A-Z]/g, (t) => "_" + t[0].toLowerCase()), g[k]);
            e.set("callback", c + ".maps." + q);
            a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
            d[q] = f;
            a.onerror = () => h = n(Error(p + " could not load."));
            a.nonce = m.querySelector("script[nonce]")?.nonce || "";
            m.head.append(a);
        }));
    d[l] ?
        console.warn(p + " only loads once. Ignoring:", g) :
        (d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)));
    initMap();
})({
    key: "AIzaSyDT-mBTtcGLnx4YCbXHyXKWKGlo8_zB7Ak",
    v: "weekly"
});
</script>
