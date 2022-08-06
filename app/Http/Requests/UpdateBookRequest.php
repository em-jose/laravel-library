<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:250',
            'isbn13' => [
                'required',
                'min:13',
                'max:13',
                Rule::unique('books')->ignore($this->route('book')->id)
            ],
            'description' => 'string|max:1000|nullable',
            'publication_date' => 'date|nullable',
            'authors' => 'required|array',
            'authors.*' => 'numeric',
            'categories' => 'nullable|array',
            'categories.*' => 'numeric',
        ];
    }
}
