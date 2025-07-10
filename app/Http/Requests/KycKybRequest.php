<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KycKybRequest extends FormRequest
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
        return [
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:100',
            'id_type' => 'required|in:passport,national_id,driving_license,other',
            'id_number' => 'required|string|max:100',
            'id_document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'residential_address' => 'required|string|max:1000',
            'proof_of_address' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'company_name' => 'required|string|max:255',
            'company_registration' => 'required|string|max:100',
            'country_incorporation' => 'required|string|max:100',
            'business_type' => 'required|in:corporation,llc,partnership,sole_proprietorship,other',
            'business_address' => 'required|string|max:1000',
            'company_documents.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'representative_name' => 'required|string|max:255',
            'representative_id' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }
}
