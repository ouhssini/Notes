<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'note' => ['required', 'string', ' min:30', 'max:2500 '],
            'title' => ['required', 'string', 'min:10','max:250'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
