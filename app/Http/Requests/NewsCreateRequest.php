<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         => 'required|min:5|max:200',
            'content'       => 'required|string|min:5|max:10000',
            'category_id'   => 'required|integer|exists:news_categories,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required'    => 'Введите заголовок новости',
            'content.min'       => 'Минимальная длина новости [:min] символов',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Заголовок',
        ];
    }
}
