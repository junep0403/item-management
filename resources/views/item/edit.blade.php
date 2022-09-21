@extends('adminlte::page')

@section('title','商品管理システム')

@section('content_header')

@stop

@section('content')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">商品編集</h3>
    </div>
    <form action="/storeEdit" method="POST">
        @csrf
        <input type="hidden" value="{{ $items->id }}" name="id">
        <div class="card-body">
            <div class="form-group">
                <label for="name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">名前</font></font></label>
                <input type="text" class="form-control" name="name" value="{{ $items->name }}">
            </div>
            <div class="form-group">
                <label for="kinds"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">種別</font></font></label>
                <input type="text" class="form-control" name="type" value="{{ $items->type }}">
            </div>
            <div class="form-group">
                <label for="detail"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">詳細</font></font></label>
                <input type="text" class="form-control" name="detail" value="{{ $items->detail }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">送信</font></font></button>
        </div>
    </form>
</div>
@stop