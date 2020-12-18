<?php

namespace App\Http\Requests\Tracking\BadDomain;

use Illuminate\Foundation\Http\FormRequest;

class GetBadDomainRequest extends FormRequest
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
            'id' => 'required|numeric|gt:0'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([$this->route('id')]);
    }
}
