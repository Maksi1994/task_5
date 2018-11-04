<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            'name' => 'required|min:3|unique:places',
            'type_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'The name of place is required',
          'name.min' => 'In the name of must exist minimum 3 chars',
          'name.unique' => 'In the name of must be unique',
          'type_id.required' => 'The type of place is required'
        ];
    }
}
