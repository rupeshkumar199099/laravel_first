{{-- @include('layout'); --}}
@include('header');
{{-- @section('section') --}}
<div class="col-12">
    <div class="container">
        <div class="row">
            <div class="col-4">
                @if(session('message'))
                <h5 class="text-center" id="success" style="background-color:green; color: white; padding:5px 10px;">{{session('message')}}</h5>
                @endif
            </div>
            
            <script>
                setTimeout(function() {
                    document.getElementById('success').remove();
                }, 3000);
            </script>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl/no.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Query</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->contact_no}}</td>
                        <td>{{$item->message}}</td>
                        <td>{{$item->latitude}}</td>
                        <td>{{$item->longitude}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/edit/{{$item->id}}"><button class="btn btn-warning me-2"><i class="fas fa-edit"></i></button></a>
                                <a href="/delete/{{$item->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-12 col-lg-4">
                   {{ $data->links() }} 
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-3">
            @php
            $choice=2;
            $fruit= ['apple','cheery','avacado','strawberry','mango'];
            @endphp
            @switch($choice)
                @case(1)
                    {{ "First Choice return" }}
                    @break
                @case(2)
                    {{"second choice return"}}
                    @break
                @default
                    {{"default choice return"}}
            @endswitch
            <br>
            @for($i=0; $i<=10; $i++)
                index value for loop is {{$i;}}<br>
            @endfor
        </div>
        <div class="col-12 col-sm-3">
            @foreach($fruit as $fr)
                fruit name is {{$fr}}<br>
            @endforeach

            @forelse($fruit as $felse)
                fruit is present at {{$loop->index}}<br>      
            @empty
                fruit is absent at {{$i}}
            @endforelse

            {{-- {!! "<script>alert('message')</script>"!!} --}}
        </div>
    </div>
</div>
{{-- @endsection --}}

