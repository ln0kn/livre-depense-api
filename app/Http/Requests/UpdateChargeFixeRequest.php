<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChargeFixeRequest extends FormRequest
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
            return [
                'frequence' => ['bail', 'required', 'gt:0', 'lt:5'],
                'article' => ['required', 'exists:articles,id'],
                'montant' => ['required', 'gt:0', 'integer'],
                'quantite' => ['required', 'gt:0'],
            ];
        } else {
            return [
                'frequence' => ['sometimes', 'bail', 'required', 'gt:0', 'lt:5'],
                'article' => ['sometimes', 'required', 'exists:articles,id'],
                'montant' => ['sometimes', 'required', 'gt:0', 'integer'],
                'quantite' => ['sometimes', 'required', 'gt:0'],
            ];
        }
    }










    protected function prepareForValidation()
    {
        if($this->frequence){
            $this->merge([
                'periodisite' => $this->frequence
            ]);
        }
        if($this->montant){
            $this->merge([
                'montant' => $this->montant
            ]);
        }
        if($this->quantite){
            $this->merge([
                'quantite' => $this->quantite
            ]);
        }
        if($this->article){
            $this->merge([
                'article_id' => $this->article
            ]);
        }
    }
}
