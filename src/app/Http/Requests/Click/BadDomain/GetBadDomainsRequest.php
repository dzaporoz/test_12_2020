<?php

namespace App\Http\Requests\Click\BadDomain;

use Illuminate\Foundation\Http\FormRequest;

class GetBadDomainsRequest extends FormRequest
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
            'name'      => 'sometimes|required',
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
