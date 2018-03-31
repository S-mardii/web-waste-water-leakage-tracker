@extends ('layouts.master')

<style>
    .header-color {
        font-size: 40px;
        margin-left: -40px;
    }

    .nav-bar-text {
        font-size: 20px;
        font-weight: bold;
    }

    .margin-left-18px {
        margin-left: -18px;
    }

    .footer-font-size {
        font-size: 22px;
    }

    .font-size-17-px {
        font-size: 17px;
    }

    .text-color {
        color: #A4C1DA;
    }

    .margin-top-25px {
        padding-top: 25px;
    }

    .margin-right-15px {
        margin-right: 15px;
    }
</style>

@section ('body')
    <div>
        @yield('section')
    </div>
@endsection