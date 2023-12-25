<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return ['nom' => ['bail', 'required', 'unique:categories,libelle,' . $this->id],];
        } else {
            return ['nom' => ['sometimes', 'bail', 'required', 'unique:categories,libelle,' . $this->id],];
        }
    }
    protected function prepareForValidation()
    {

        if ($this->nom) {
            $this->merge(
                [
                    'libelle' => $this->nom,
                ]
            );
        }
    }
}
