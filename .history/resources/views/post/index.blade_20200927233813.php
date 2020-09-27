@extends('layouts.app')
@include('navbar')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementByld('logout-form').submit();">
    サインアウト<br/>
</a>
<p>仮のページ</p>

<a href="#" class="btn btn-primary">仮のボタンです</a>

@endsection
