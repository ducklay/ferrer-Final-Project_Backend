<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BMWRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'mileage' => 'required|string|max:255',
            'horsepower' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,bmp,png|max:2048',
        ];
    }
}
