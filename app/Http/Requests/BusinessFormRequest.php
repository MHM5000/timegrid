<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class BusinessFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		switch ($this->method())
		{
			case 'POST':
				return true;
				break;
			
			default:
				$business = \App\Business::find($this->route()->parameter('businesses'));

        		return $this->user()->id == $business->owner()->id;

				break;
		}
			# code...
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		switch ($this->method())
		{
			case 'PATCH':
			case 'PUT':
			case 'POST':
				return [
        			  'name' => 'required|min:3',
        			  'slug' => 'required|min:3',
        			  'description' => 'required|min:10'
        			];
				break;
			
			default:

        		return [];

				break;
		}

	}

}