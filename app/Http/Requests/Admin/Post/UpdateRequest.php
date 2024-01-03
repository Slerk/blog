<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
// реквест валидирует данные формы,проверяет правильные ли данные массива пришли
class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_img' => 'nullable|file',
            'main_img' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tags_id' => 'nullable|array',
            'tags_id.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле нужно заполнить',
            'title.string' => 'Данные должны быть строкой',
            'preview_img.required' => 'Это поле нужно заполнить',
            'preview_img.file' => 'Выберите файл',
            'main_img.required' => 'Это поле нужно заполнить',
            'main_img.file' => 'Выберите файл',
            'category_id.required' => 'Это поле нужно заполнить',
            'category_id.integer' => 'ID категории дожлен быть числом',
            'category_id.exists' => 'ID категории дожлен быть в базе данных',
            'tags_id.array' => 'Необходимо отправить массив данных',


        ];
    }
}
