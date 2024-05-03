<?php

namespace App\Http\Requests\DishesRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DishesRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:dishes,title',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'ingredients' => 'required|array',
            'ingredients.*' => 'required|string|max:255',
        ];
    }
//    public function updateRule(): array
//    {
//        $dishesId = $this->route('dishesId');
//        return [
//            'title' => ['required','string','max:255',
//            Rule::unique('dishes', 'title')->ignore($dishesId,'id')],
//            'description' => 'required|string|max:255',
//            'price' => 'required|numeric|min:0',
//            'ingredients' => 'required|array',
//            'ingredients.*' => 'required|string|max:255',
//        ];
//    }
}
