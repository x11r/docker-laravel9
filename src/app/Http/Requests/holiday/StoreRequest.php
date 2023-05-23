<?php

declare(strict_types=1);

namespace App\Http\Requests\holiday;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'date' => [
				'required',
	            'date',
	            'unique:holidays'
            ],
	        'name' => [
				'required',
		        'string',
		        'max:255'
	        ],
	        'comment' => [
				'nullable',
		        'string',
		        'max:255',
	        ]
        ];
    }

	public function attributes()
	{
		return [
			'name' => '休日名',
		];
	}
}
