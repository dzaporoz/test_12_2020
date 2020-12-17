<?php

namespace App\Http\Requests\Click\Click;

use Illuminate\Foundation\Http\FormRequest;

class StoreClickRequest extends FormRequest
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
        return [
            'ua'        => 'sometimes|required',
            'ip'        => 'sometimes|required|ip',
            'ref'       => 'sometimes|required',
            'param2'    => 'sometimes|required',
        ];
    }
}
