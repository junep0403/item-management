@extends('adminlte::page')

@section('title','商品管理システム')

@section('content_header')

@stop

@section('content')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">会員情報編集</h3>
    </div>
    <form action="/userEdit" method="POST">
        @csrf
        <input type="hidden" value="{{ $users->id }}" name="id">
        <div class="card-body">
            <div class="form-group">
                <label for="name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">名前</font></font></label>
                <input type="text" class="form-control" name="name" value="{{ $users->name }}">
            </div>
            <div class="form-group">
                <label for="email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">メールアドレス</font></font></label>
                <input type="text" class="form-control" name="type" value="{{ $users->email }}">
            </div>
            <div class="form-group">
                <label for="role"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">権限</font></font></label>
                <input type="text" class="form-control" name="detail" value="{{ $users->role }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">送信</font></font></button>
        </div>
    </form>
</div>
@stop