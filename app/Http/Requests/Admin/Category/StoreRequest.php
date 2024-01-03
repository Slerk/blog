<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
// реквест валидирует данные формы,проверяет правильные ли данные массива пришли
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //здесь мы задаем то,что мы ожидаем от формы,какой массив должен быть
    public function rules()
    {
        return [
           'title' => 'required|string'
        ];
    }
}
