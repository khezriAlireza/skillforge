<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('adminPanel/assets/images/favicon-32x32.png')}}" type="image/png"/>
    <link href="{{asset('adminPanel/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/bootstrap-extended.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('adminPanel/assets/fonts/googlefonts.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminPanel/assets/fonts/bootstrap-icons.css')}}">
    <link href="{{asset('adminPanel/assets/css/pace.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/dark-theme.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/light-theme.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/semi-dark.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/header-colors.css')}}" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('admin.app_title') }} - {{ config('app.name') }}</title>
    <style>
        .locale-switcher .locale-link { color: inherit; text-decoration: none; font-size: 13px; padding: 2px 4px; opacity: 0.7; }
        .locale-switcher .locale-link.active { opacity: 1; font-weight: bold; text-decoration: underline; }
        .locale-switcher .locale-separator { opacity: 0.5; font-size: 12px; }
    </style>
</head>

<body>

<div class="wrapper">
