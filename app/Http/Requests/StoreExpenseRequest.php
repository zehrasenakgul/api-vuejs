<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
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
            'amount' => ["required"],
            'spending' => ["required"],
            'category_id' => ["required", "exists:categories,id"],
            'date' => ["required"],
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'This Spending Amount field is required',
            'spending.required' => 'This Spent Place field is required',
            'category_id.required' => 'This Select Category field is required',
            'date.required' => 'This Date field is required',
        ];
    }
}
