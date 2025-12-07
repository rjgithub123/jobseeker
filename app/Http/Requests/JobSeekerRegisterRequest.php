<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobSeekerRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
 return [
   'name'=>'required',
   'email'=>'required|email|unique:job_seekers',
   'phone'=>'required|min:10',
   'experience'=>'required|numeric',
   'notice_period'=>'required|numeric',
   'skills'=>'required',
   'location_id'=>'required',
   'resume'=>'required|mimes:pdf,doc,docx',
   'photo'=>'image|mimes:jpg,png',
   'password'=>'required|min:6'
 ];
}

}
