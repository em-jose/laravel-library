<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'isbn13' => 'required|unique:books|min:13|max:13',
            'description' => 'string|max:1000|nullable',
            'publication_date' => 'date|nullable',
            'authors' => 'required|array',
            'authors.*' => 'numeric',
            'categories' => 'nullable|array',
            'categories.*' => 'numeric',
        ];
    }
}
