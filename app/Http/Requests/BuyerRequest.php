<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        if (!$this->route('buyer')) {
            return [
                'phone_cell' => 'required|celular_com_ddd',
                'cpf' => 'required|cpf',
                'iduser' => 'required|unique:buyers|exists:users,id',
            ];
        } else {
            return [
                'phone_cell' => 'required|celular_com_ddd',
                'cpf' => 'required|cpf',

            ];
        }
    }
}