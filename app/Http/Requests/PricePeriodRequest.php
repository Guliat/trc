<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricePeriodRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'price_per_day' => 'required|numeric|min:'.config('trc.default_price_per_day')
        ];
    }
}
