<?php

namespace App\Http\Requests\Tracking\Click;

use Illuminate\Foundation\Http\FormRequest;

class ShowClickRequest extends FormRequest
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
            'click' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['click' => $this->route('click')]);
    }
}
