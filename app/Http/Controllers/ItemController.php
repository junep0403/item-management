<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

        /**
        * 商品削除
        *
        */
        public function destroy($id)
        {
            // Itemsテーブルから指定のIDのレコード1件を取得
            $item = Item::find($id);
            // レコードを削除
            $item->delete();
            // 削除したら一覧画面にリダイレクト
            return redirect('/items');
        }

        /**
        * 商品編集
        *
        */
    public function edit (Request $request){
        $items = Item::where('id', '=', $request->id)->first();
        // dd($items);
        return view('item.edit')->with([
            'items' => $items
        ]);
    }

        /**
        * 商品編集
        *
        */
        public function storeEdit(Request $request)
        {
            // Itemsテーブルから指定のIDのレコード1件を取得
            $items = Item::find($request->id);
            
            //dd($items);
            $items->fill($request->all());
            $items->save();

            // 編集したら一覧画面にリダイレクト
            return redirect('/items');
        }
}
