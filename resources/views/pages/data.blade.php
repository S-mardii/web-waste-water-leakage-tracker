@extends ('layouts.master')

@section ('body')
    <div class="container ">
        <h5>Search Data</h5>
    </div>


    <div class="container">
        {{-- search-box --}}
        @include('includes.partials.search')
        {{-- /search-box --}}

        @include('includes.partials.download')
    </div>




        <

        <div class="">
            <h2>Download</h2>
        </div>
    </div>
@endsection