<?php

namespace App\Http\Requests\Click\BadDomain;

use Illuminate\Foundation\Http\FormRequest;

class DeleteBadDomainRequest extends FormRequest
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
            'bad_domain'    => 'required|numeric|gt:0'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['bad_domain' => $this->route('bad_domain')]);
    }
}
