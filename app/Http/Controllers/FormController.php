<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Form;

class FormController extends Controller
{
    /**
     * Сохраняет данные на сайт data
     */
    public function saveContact(Request $request)
    {
        $lastPage = Page::latest()->first();
        $id_page = $lastPage->pages_uid + 1;
        $arrPageInfo = json_decode($request[0], true);
        foreach ($arrPageInfo as $fields) {
             Page::create([
                'data_pages' => $fields,
                'pages_uid' =>  $id_page
            ]);
        }
        
        return self::getForm();
    }

    /**
     * Возвращает поля формы
     */
    public function getForm()
    {
        $fieldsForm = Form::all();
        return $fieldsForm->toJson();
    }
}
