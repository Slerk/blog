<?php

namespace App\Http\Requests\Admin\User;

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
           'name' => 'required|string',
           'email' => 'required|string|email|unique:users',
           'password' => 'required|string',
           'role' => 'required|integer',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Заполните поле',
            'name.string' => 'Логин должен быть стрококй',
            'email.required'=> 'Заполните поле',
            'email.string'=> 'Email должен быть стрококй',
            'email.email'=> 'Введите корректный адрес почты @.com',
            'email.unique'=> 'Такая почта уже зарегистрирована',




        ];

    }
}
