<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        
        return $user != null && $user->tokenCan('update');
    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'designation' => ['bail', 'required', 'unique:articles,libelle', 'max:25'],
                'category' => ['required', 'exists:categories,id'],

            ];
        } else {
            return [
                'designation' => ['sometimes', 'bail', 'required', 'unique:articles,libelle', 'max:25'],
                'category' => ['sometimes', 'required', 'exists:categories,id'],

            ];
        }
    }
    protected function prepareForValidation()
    {
        $designation = $this->designation;
        $category = $this->category;
    
        if ($designation || $category) {
            $dataToMerge = [];
    
            if ($designation) {
                $dataToMerge['libelle'] = $designation;
            }
    
            if ($category) {
                $dataToMerge['categorie_id'] = $category;
            }
    
            $this->merge($dataToMerge);
        }
    }
    
}
