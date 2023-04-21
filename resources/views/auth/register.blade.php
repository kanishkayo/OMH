<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="pane scroller">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GEOBIZZ</title>
    <link href="{{asset('/css/app.css') }}" rel="stylesheet">
    <style>
        .pane {
            color: #2b2b2b;
            height: 16.1em;
            overflow-y: scroll;
            border: none !important;
        }
        .scroller {
            scrollbar-color: #2b2b2b;
            scrollbar-width: thin;
        }
        .scroller::-webkit-scrollbar {
            width: 10px;
            border: none !important;
        }
        .scroller::-webkit-scrollbar-track {
            background: #9E9E9E;
            border: none !important;
        }
        .scroller::-webkit-scrollbar-thumb {
            background: #2b2b2b;
            border: none !important;
        }
    </style>
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>
    </body>
    <script src="{{asset('/js/app.js')}}"></script>
</html>
