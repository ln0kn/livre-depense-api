<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChargeFixeRequest extends FormRequest
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
            'frequence'=>['bail','required', 'gt:0','lt:5'],
            'article' => ['required', 'exists:articles,id'],
            'montant' => ['required', 'gt:0','integer'],
            'quantite' => ['required', 'gt:0'],
            
        ];

    }

    protected function prepareForValidation()
    {
        $this->merge([
            'periodisite'=> $this->frequence,
            'montant'=> $this->montant,
            'quantite'=> $this->quantite,
            'article_id'=> $this->article
        ]);
    }
}
