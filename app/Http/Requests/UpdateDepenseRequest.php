<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepenseRequest extends FormRequest
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
                'nom'=>['bail','required', 'unique:depenses,designation,'.$this->id,'max:25'],
                'montant'=>['bail','required','gt:0'],
                'quantite'=>['bail','required','gt:0'],
                'dateAchat'=>['bail','required','date_format:Y-m-d H:i:s'],
                'article' => ['required', 'exists:articles,id'],
                
            ];
        } else {
            return [
                'nom'=>['sometimes','bail','required', 'unique:depenses,designation,'.$this->id,'max:25'],
                'montant'=>['sometimes','bail','required','gt:0'],
                'quantite'=>['sometimes','bail','required','gt:0'],
                'dateAchat'=>['sometimes','bail','required','date_format:Y-m-d H:i:s'],
                'article' => ['sometimes','required', 'exists:articles,id'],
                
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->nom) {
            $this->merge([
                'designation' => $this->nom
            ]);
        }
        if ($this->dateAchat) {
            $this->merge([
                'paid_date' => $this->dateAchat
            ]);
        }
        if ($this->article) {
            $this->merge([
                'article_id' => $this->article
            ]);
        }
    }
}
