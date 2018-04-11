@extends ('layouts.master')

@section ('body')
    <div class="container">
        {{-- search-box --}}
        <form role="form" method="post" action="{{ route('data.search') }}">
            @include('includes.partials.search')
        </form>
        {{-- /search-box --}}
    </div>
    <div class="padding-1-5-rem"></div>

    <div class="container padding-1-rem">
        @include('includes.partials.download')
    </div>

    <div class="container padding-1-rem">
        @include('includes.partials.report-fact')
    </div>
    <div class="padding-1-5-rem"></div>

@endsection