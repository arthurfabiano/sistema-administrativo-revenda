<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovimentoFinanceiroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'tipo' => 'required',
            'empresa_id' => 'required'
        ];
    }

    public function validationData()
    {
        $campos = $this->all();

        $campos['valor'] = numero_br_para_iso($campos['valor']);

        $this->replace($campos);

        return $campos;
    }
}
