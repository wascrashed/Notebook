<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notebook;

class NotebookController extends Controller
{
    // Отображение списка записей
    public function index()
    {
        $notebooks = Notebook::all();
        return response()->json($notebooks);
    }

    // Создание новой записи
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'company' => 'nullable',
            'phone' => 'required',
            'email' => 'required',
            'birthday' => 'nullable',
            'photo' => 'nullable',
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/photos', $filename);
            $data['photo'] = $path;
        }

        $notebook = Notebook::create($data);
        return response()->json($notebook, 201);
    }

    // Отображение записи по id
    public function show(Notebook $notebook)
    {
        return response()->json($notebook);
    }

    // Обновление записи по id
    public function update(Request $request, Notebook $notebook)
    {
       // dd($request);

        $data = $request->validate([
            'name' => 'required',
            'company' => 'nullable',
            'phone' => 'required',
            'email' => 'required',
            'birthday' => 'nullable',
            'photo' => 'nullable',
        ]);

        ///dd($data);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/photos', $filename);
            $data['photo'] = $path;
        }

        $notebook->update($data);
    //dd($notebook);
        return response()->json($notebook, 200);
    }

    // Удаление записи по id
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return response()->json(null, 204);
    }
}
