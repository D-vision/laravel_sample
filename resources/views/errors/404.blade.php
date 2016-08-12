@extends('layouts.app')

@section('content')
    <style>

        .error.container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;

            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato', sans-serif;
        }

        .error .content {
            text-align: center;
            display: inline-block;
        }

        .error .title {
            font-size: 72px;
            margin-bottom: 40px;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato', sans-serif;

        }

    </style>
    <div class="error container">
        <div class="content">
            <h1 class="title">404. Not Found.</h1>
        </div>
    </div>
@endsection