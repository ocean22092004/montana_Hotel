<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'room_type_id' => ['required', 'exists:room_types,id'],
            'bed_count' => ['required', 'integer', 'min:0'],
            'max_occupancy' => ['required', 'integer', 'min:0'],
            'price_per_night' => ['required', 'integer', 'min:0'],
            'price_per_hour' => ['required', 'integer', 'min:0'],
            'price_per_day' => ['required', 'integer', 'min:0'],
        ];
    }
}
