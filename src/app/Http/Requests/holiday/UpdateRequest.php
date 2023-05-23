<?php

namespace App\Http\Requests\holiday;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
//		$id = $this->request()->input('id');
		$params = $this->route()->parameters();

//		\Log::debug(__LINE__ . ' ' . __METHOD__ . ' [id] ' . $id);
		\Log::debug(__LINE__ . ' ' . __METHOD__ . ' [params] ' . print_r($params, true));
        return [
//			'id' => [
//				'required',
//				'integer',
//			],
            'date' => [
				'required',
	            'date',
	            Rule::unique('holidays')->ignore($params['holiday']),
            ],
	        'name' => [
				'required',
		        'string',
		        'max:255',
	        ],
	        'comment' => [
				'nullable',
		        'string',
		        'max:255'
	        ]
        ];
    }

	/**
	 * @param Validator $validator
	 */
	public function attributes()
	{
		return [
			'name' => '休日名',
		];
	}
}
