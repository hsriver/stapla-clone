<?php

namespace App\Http\Controllers;

use App\Log;
use App\Material;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function showLogs()
    {
        $logs = Log::orderBy('datetime', 'desc')->get();

        return view('Logs.index', [
            'logs' => $logs,
        ]);
    }

    //作成
    public function showCreateForm()
    {
        //ユーザーが持ってるカテゴリ、教材を取得するように変更する
        $materials = Material::all();
        return view('Logs.create', [
            'materials' => $materials
        ]);
    }
    public function create(Request $request)
    {
        $log = new Log();
        //とりあえずuser_idが1で入る
        //後で修正する必要あり(updateも同様)
        $log->user_id = Auth::id();
        $form = $request->all();
        unset($form['_token']);
        $log->fill($form)->save();
        return redirect()->route('timeline');
    }

    //詳細
    public function show(int $id)
    {
        $log = Log::find($id);

        return view('Logs.show', [
            'log' => $log,
        ]);
    }

    //編集
    public function showEditForm(int $id)
    {
        $log = Log::find($id);
        //教材のid取得
        $givenMateriaId = $log->material_id;
        //教材のidから教材のインスタンスを取得
        $givenMaterial = Material::find($givenMateriaId);

        //ユーザーからカテゴリ、教材取得
        $user = Auth::user();
        $categories = $user->category;
        $materials = $user->material;

        //表示用日付
        $datetime = explode(" ", $log->datetime);
        $date = $datetime[0];
        $time = $datetime[1];
        return view('Logs.edit', [
            'log' => $log,
            'date' => $date,
            'time' => $time,
            'givenMaterial' => $givenMaterial,
            'materials' => $materials,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request)
    {
        $log = Log::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $log->fill($form)->save();
        return redirect()->route('timeline');
    }

    public function delete(Request $request)
    {
        $log = Log::find($request->id);

        $log->delete();
        return redirect()->route('timeline');
    }
}
