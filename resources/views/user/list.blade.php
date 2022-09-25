@extends('adminlte::page')

@section('title', '会員一覧')

@section('content_header')

<h1>会員一覧</h1>

@stop

@section('content')

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline my-2 my-lg-0" action="{{ route('userSearch') }}" method="GET">
                        <input class="form-control" type="search" name="search" placeholder="検索" aria-label="uaserSearch">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="card-tools">
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
                                    
                                @if($user->role === 1)
                                    <td>{{ '管理者' }}</td>
                                @elseif($user->role === 10)
                                    <td>{{ '一般' }}</td>
                                @endif
                                    <td>{{ $user->created_at }}</td>
                                    @can('admin-higher')
                                    <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-primary btn-sm">編集</a></td>
                                    <td><form action="{{ route('user.destroy', ['id'=>$user->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">削除</button></form></td>
                                    @endcan
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