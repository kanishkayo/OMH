<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="pane scroller">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>APPNAME</title>
    <link href="{{asset('/css/app.css') }}" rel="stylesheet">
    <style>
        a[href^="http://maps.google.com/maps"]{display:none !important}
        a[href^="https://maps.google.com/maps"]{display:none !important}
        .gmnoprint a, .gmnoprint span, .gm-style-cc {
            display:none;
        }
        /* html {   overflow-y: hidden !important; }  */
        .pane {
            color: #2b2b2b;
            height: 16.1em;
            //overflow-y: scroll;
            border: none !important;
            overflow: hidden !important;
        }
        .scroller {
            scrollbar-color: #2b2b2b;
            scrollbar-width: thin;
            overflow: hidden !important;
        }
        .scroller::-webkit-scrollbar {
            width: 10px;
            border: none !important;
            overflow: hidden !important;
        }
        .scroller::-webkit-scrollbar-track {
            background: #9E9E9E;
            border: none !important;
            overflow: hidden !important;
        }
        .scroller::-webkit-scrollbar-thumb {
            background: #2b2b2b;
            border: none !important;
            overflow: hidden !important;
        }
    </style>
    <script>
        window.Laravel = '{!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
        ]) !!}';
    </script>
</head>
    <body style="overflow: hidden !important;">
        <div id="app">
            <apilogin></apilogin>
        </div>
    </body>
    <script src="{{asset('/js/app.js')}}"></script>
</html>
