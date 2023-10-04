{{-- common.baseテンプレートを使用する --}}
@extends('common.base')

@php
    $URL = 'http://133.18.242.137/';
@endphp

{{-- contentsにこの内容を埋め込む --}}
@section('contents')
    <ul>
        <li>
            <a href="{{ $URL }}">@php echo $URL @endphp</a>
        </li>
        <li>
            <a href="{{ url('/') }}">@php echo url('/') @endphp</a>
        </li>
        <li>
            <a href="{{ url('/contact') }}">@php echo url('/contact') @endphp</a>
        </li>
        <li>
            <a href="{{ url('/task') }}">@php echo url('/task') @endphp</a>
        </li>
        <li>
            <a href="{{ url('/mail/send') }}">@php echo url('/mail/send') @endphp</a>
        </li>
    </ul>
@endsection
