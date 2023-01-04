<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class StoreTicket extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(
            [
                'errors' => $validator->errors()
            ],
            Response::HTTP_UNPROCESSABLE_ENTITY
        ));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'todos' => 'required',
        ];
    }

    public function messages()
    {
        return   $messages =  [
            'name.required' => 'Ticket name is required',
            'name.max' => 'Ticket name maximum length is 255 characters',
            'todos.required' => 'One todo is must',
        ];

    }
}
