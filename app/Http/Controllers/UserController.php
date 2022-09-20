<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('user.list', [
            'users' => $users,
        ]);
    }

    
        /**
        * ユーザー削除
        *
        */
        public function delete($id)
        {
            // Usersテーブルから指定のIDのレコード1件を取得
            $user = User::find($id);
            // レコードを削除
            $user->delete();
            // 削除したら一覧画面にリダイレクト
            return redirect('/list');
        }
}
