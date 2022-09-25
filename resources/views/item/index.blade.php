@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')

    <h1>商品一覧
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <div class="form-inline">
                <form class="form-inline my-2 my-lg-0" action="{{ route('itemSearch') }}" method="GET">
                    <input class="form-control" type="search" name="search" placeholder="検索">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>

                <div class="p-3"></div>

                <div class="text-right form-inline">
                    <a href="{{ url('items/add') }}" class="btn btn-primary">商品登録</a>
                </div>
                </div>

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
                                <th>種別</th>
                                <th>詳細</th>
                                <th>登録日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td><a href="{{ route('edit', $item->id) }}" class="btn btn-outline-primary btn-sm">編集</a></td>
                                    <td><form action="{{ route('item.destroy', ['id'=>$item->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">削除</button></form></td>
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
