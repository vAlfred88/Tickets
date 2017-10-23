<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|min:3|max:15|required|unique:statuses',
            'label' => 'min:3|max:15|required',
        ];
    }
}
