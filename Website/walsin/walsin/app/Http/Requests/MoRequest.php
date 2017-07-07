<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MoRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'id' => 'required',
			'w_id' => 'required'
		];
	}
}