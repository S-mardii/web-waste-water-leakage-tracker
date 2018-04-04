<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8 no-js"><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9 no-js"><![endif]-->
<!--[if !IE]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
    @include('includes.head')

    @stack('after-styles')
</head>

<body>
    @include('includes.header')

    <div class="padding-1-rem">
        @yield('body')
    </div>

    @include('includes.foot')
    @stack('after-scripts')
</body>
</html>