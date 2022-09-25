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

        /**
        * ユーザー編集
        *
        */
    public function edit (Request $request){
        $users = User::where('id', '=', $request->id)->first();
        // dd($users);
        return view('user.useredit')->with([
            'users' => $users
        ]);
    }

        /**
        * ユーザー編集
        *
        */
        public function userEdit(Request $request)
        {
            // Usersテーブルから指定のIDのレコード1件を取得
            $users = User::find($request->id);
            
            //dd($users);
            $users->fill($request->all());
            $users->save();

            // 編集したら一覧画面にリダイレクト
            return redirect('/list');
        }

        /**
         * ユーザー検索
         * 
         * 
         */

        public function userSearch(Request $request)
        {
            $keyword = $request->input('search');
            $query = User::query();
    
            if(!empty($keyword)) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            }
    
            $users = $query->get();
    
            return view('user.list', compact('users', 'keyword'));
        }
}
