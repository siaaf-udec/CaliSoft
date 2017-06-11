<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <title>{{ config( 'app.name' ) }} @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="{{ config( 'app.description' ) }}" name="description"/>
    <meta content="{{ config( 'app.author', 'Siaaf' ) }}" name="author"/>
    <meta content="{{ csrf_token() }}" name="csrf-token"/>

    @include('material.partials.head')

</head>
{{-- END HEAD --}}
{{-- BEGIN BODY --}}
<body>

    {{-- Body Content --}}
    @yield('content')

    {{-- Core Scripts --}}
    @include('material.partials.scripts')
    
    {{-- Javascript Libraries --}}
    @stack('plugins')

    {{-- Javascript Functions --}}
    @stack('functions')
</body>
{{-- END BODY --}}
</html>