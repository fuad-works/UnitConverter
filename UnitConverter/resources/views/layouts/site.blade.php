@include('layouts.parts.head')
@include('layouts.parts.navbar')

<div class="container mt-2">
    <div class="row">
        <div class="col-md-3">

            @include('layouts.parts.sidebar')
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.parts.footer')
