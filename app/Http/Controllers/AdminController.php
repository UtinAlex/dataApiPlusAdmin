<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class AdminController extends Controller
{
    /**
     * Возвращает поля формы
     */
    public function getAdminPanel()
    {
        $fieldsForm = Form::all()->toArray();
        $fieldsFormArr = ['fieldsForm' => $fieldsForm];
        return view('admin', $fieldsFormArr);
    }

    /**
     * Удаляет поля формы
     */
    public function delField(Request $request)
    {
        $requestArr = $request->all();
        $del = array_shift($requestArr);
        foreach ($requestArr as $id) {
            Form::where('id', $id)->delete();
        }
        return redirect('/');
    }

     /**
     * Записывает новые поля формы
     */
    public function saveField(Request $request)
    {
        Form::create([
            'title' => $request->title,
            'field_name' =>  $request->field_name,
            'placeholder_form' =>  $request->placeholder_form,
        ]);
        return redirect('/');
    }
}
