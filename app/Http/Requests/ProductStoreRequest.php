<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => ['required', 'min:5', 'max:20'],
            'price' => ['required', 'numeric', 'min:1'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'image' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'category_id' => ['required', 'integer', 'not_in:0'],  // category_id không thể là 0
            'status' => ['required', 'in:0,1'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.min' => 'Tên sản phẩm phải có ít nhất 5 ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 20 ký tự.',

            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 1.',

            'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'quantity.numeric' => 'Số lượng sản phẩm phải là một số.',
            'quantity.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 1.',

            'image.required' => 'Ảnh sản phẩm là bắt buộc.',
            'image.file' => 'File ảnh phải là một tệp tin.',
            'image.mimes' => 'Ảnh phải có định dạng là jpg, png hoặc pdf.',
            'image.max' => 'Kích thước ảnh không được vượt quá 2MB.',

            'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
            'category_id.integer' => 'Danh mục sản phẩm phải là một số nguyên.',
            'category_id.not_in' => 'Danh mục sản phẩm không thể là 0.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái phải là 0 (inactive) hoặc 1 (active).',

        ];
    }
}
