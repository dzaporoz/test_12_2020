<?php

namespace App\Http\Requests\Click\Click;

use Illuminate\Foundation\Http\FormRequest;

class GetClicksRequest extends FormRequest
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
            'limit'     => 'sometimes|required|numeric|gt:0',
            'offset'    => 'sometimes|required|numeric|gte:0',
            'sort_by'   => 'sometimes|required',
            'order'     => 'sometimes|required',
            'id'        => 'sometimes|required',
            'ua'        => 'sometimes|required',
            'ip'        => 'sometimes|required',
            'ref'       => 'sometimes|required',
            'param1'    => 'sometimes|required',
            'param2'    => 'sometimes|required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'limit' => 20,
            'offset' => 0,
        ]);
    }
}
