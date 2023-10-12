<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'fname' =>['required'],
            'nic' => ['required'],
            'contact' => ['required'],
            'address' => ['required'],
            'iqama' => ['required'],
            'waddress' => ['required'],
            'scontact' => ['required'],
            'rcontact' => ['required'],
        ];
    }
}
