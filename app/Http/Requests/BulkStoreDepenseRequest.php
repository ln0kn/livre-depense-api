<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreDepenseRequest extends FormRequest
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
        // return [
        //     '*.nom'=>['bail','required', 'unique:depenses,designation','max:25'],
        //     '*.montant'=>['bail','required','gt:0'],
        //     '*.quantite'=>['bail','required',],
        //     '*.dateAchat'=>['bail','required','date_format:Y-m-d H:i:s'],
        //     '*.article' => ['required', 'exists:articles,id'],

        // ];




        $rules = [];

        foreach ($this->input() as $key => $obj) {
            $rules["$key.nom"] = ['bail', 'required', 'unique:depenses,designation', 'max:25'];
            $rules["$key.montant"] = ['bail', 'required', 'gt:10'];
            $rules["$key.quantite"] = ['bail', 'required'];
            $rules["$key.dateAchat"] = ['bail', 'required', 'date_format:Y-m-d H:i:s'];
            $rules["$key.article"] = ['required', 'exists:articles,id'];
        }

        return $rules;
    }




    public function messages(): array
    {
        $messages = [];

        foreach ($this->toArray() as $key => $obj) {
            $messages["$key.nom.unique"] = "The $key.nom has already been taken.";
            $messages["$key.montant.gt"] = "The $key.montant field must be greater than 8.";
        }

        return $messages;
    }






    protected function prepareForValidation()
    {
        $data = [];

        foreach ($this->toArray() as $obj) {
            $obj['designation'] = $obj['nom'] ?? null;
            // $obj['montant'] = $obj['montant'] ?? null;
            // $obj['quantite'] = $obj['quantite'] ?? null;
            $obj['paid_date'] = $obj['dateAchat'] ?? null;
            $obj['article_id'] = $obj['article'] ?? null;

            $data[] = $obj;
        }
        $this->merge($data);
    }
}
