@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')

<h1>会員一覧</h1>

@stop

@section('content')

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <!-- <div class="input-group input-group-sm">
                        </div> -->
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>権限</th>
                                <th>登録日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">編集</a></td>
                                    <td><form action="{{ route('user.destroy', ['id'=>$user->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">削除</button></form></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop