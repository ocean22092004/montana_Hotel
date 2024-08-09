<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomTypeRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:1,0'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Trường tên là bắt buộc',
            'name.string' => 'Tên phải là chuỗi ký tự',
            'name.max' => 'Tên không vượt quá 255 ký tự',

            'image.required' => 'Tệp là bắt buộc',
            'image.image' => 'Tệp bắt buộc là hình ảnh',
            'image.mimes' => 'Hình ảnh là các tệp loại:jpeg,png,jpg,gif',
            'image.max' => 'kích thước ảnh không vượt quá 2048 kylobytes',

            'description.required'=>'Mô tả là bắt buộc',
            'description.string'=>'Mô tả là chuỗi ký tự',

            'status.required' => 'Trường Status là bắt buộc',
            'status.in' => 'Status chỉ là public hoặc Private',
        ];
    }
}
