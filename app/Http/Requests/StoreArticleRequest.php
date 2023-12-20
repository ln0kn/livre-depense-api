<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
class StoreArticleRequest extends FormRequest
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
            'designation'=>['bail','required', 'unique:articles,libelle','max:25'],
            'category' => ['required', 'exists:categories,id'],
            
        ];

    }

    protected function prepareForValidation()
    {
        $this->merge([
            'libelle'=> $this->designation,
            'categorie_id'=> $this->category
        ]);
    }
}
