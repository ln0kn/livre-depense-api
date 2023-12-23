<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConstanteRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'seuil' => ['required', 'gt:0', 'lt:100'],
                'montantDepense' => ['required', 'gt:0'],
            ];
        } else {
            return [
                'seuil' => ['sometimes', 'required', 'gt:0', 'lt:100'],
                'montantDepense' => ['sometimes', 'required', 'gt:0'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->seuil) {
            $this->merge([
                'seuil_alerte' => $this->seuil
            ]);
        }
        if ($this->montantDepense) {
            $this->merge([
                'depense_mensuel' => $this->montantDepense
            ]);
        }
        //  if($this->seuil && $this->montantDepense){
        //     dd('');
        //     $this->merge([
        //         'seuil_alerte' => $this->seuil,
        //         'depense_mensuel' => $this->montantDepense
        //     ]);
        //  }
    }
}
