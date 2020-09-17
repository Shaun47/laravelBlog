<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\NotAuthorizedException;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('category') == config('cms.default_category_id'));

    }

    public function forbiddenResponse(){
        return redirect()->back()->with('error-message','you can\'t delete default category');
    }


    protected function failedAuthorization()
    {
        throw new HttpResponseException($this->forbiddenResponse());
    }
   
    


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
