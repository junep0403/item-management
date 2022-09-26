@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="text-center"><img src="http://127.0.0.1:8000/vendor/adminlte/dist/img/AdminLTELogo.png" alt="商品管理"></div>
    <div class="p-3"></div>
    <h1 class="text-center">商品管理システム</h1>
@stop

@section('content')
    <p class="text-center">～サイドバーから項目を選択してください～</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

