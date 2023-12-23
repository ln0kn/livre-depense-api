<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepenseRequest extends FormRequest
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
            'nom'=>['bail','required', 'unique:depenses,designation','max:25'],
            'montant'=>['bail','required','gt:0'],
            'quantite'=>['bail','required','gt:0'],
            'dateAchat'=>['bail','required','date_format:Y-m-d H:i:s'],
            'article' => ['required', 'exists:articles,id'],
            
        ];

    }

    protected function prepareForValidation()
    {
        $this->merge([
            'designation'=> $this->nom,
            'paid_date'=> $this->dateAchat,
            'article_id'=> $this->article
        ]);
    }
}