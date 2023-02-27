<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>EMIS</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    <link href="/assets/css/dashlite.css" type="text/css" rel="stylesheet"/>
    <link href="/assets/css/theme.css" type="text/css" rel="stylesheet"/>

    <script src="/assets/js/bundle.js?ver=2.2.0"></script>
    <script src="/assets/js/scripts.js?ver=2.2.0"></script>
    <script src="/assets/js/charts/gd-invest.js?ver=2.2.0"></script>
    <script src="/assets/js/apps/inbox.js?ver=2.2.0"></script>
    <script src="/assets/js/libs/tagify.js?ver=2.2.0"></script>


    <style>
        .bg-light {
         background-color: #eae9e9 !important;
        }
    </style>
</head>
<body style="overflow-x: hidden">
<div id="app" style="overflow-x: hidden">
</div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
