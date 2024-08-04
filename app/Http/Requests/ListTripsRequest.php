<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListTripsRequest extends FormRequest
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
            'date' => 'required_without:date_range|date|date_format:Y-m-d',
            'date_range' => 'required_without:date|array',
            'date_range.*' => 'required_with:date_range|date|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'date.required_without' => 'The date is required when date range is not provided.',
            'date.date' => 'The date must be a valid date.',
            'date.date_format' => 'The date must be in the format Y-m-d.',
            'date_range.required_without' => 'The date range is required when date is not provided.',
            'date_range.array' => 'The date range must be an array.',
            'date_range.*.date' => 'Each date in the date range must be a valid date.',
            'date_range.*.date_format' => 'Each date in the date range must be in the format Y-m-d.',
        ];
    }
}
