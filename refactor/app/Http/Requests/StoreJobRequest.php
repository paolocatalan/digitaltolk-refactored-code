<?php declare(strict_types=1);

namespace DTApi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'immediate' => 'required',
            'status' => 'required',
            'message' => 'required',
            'field_name' => 'required',
            'due' => 'required|date|date_format:Y-m-d H:s:i|after:now',
            'gender' => 'required',
            'job_type' => 'required',
            'job_for' => 'required',
            'certified' => 'required',
            'customer_phone_type' => 'required',
            'customer_physical_type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // custom error messages
        ];
    }
}
