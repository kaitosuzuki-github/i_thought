<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $num_byte = 15;
        $max_size = 1024 * $num_byte;

        return [
            'event' => 'required|string|max:255',
            'emotion' => 'required|string|max:255',
            'emotion_num' => 'required|integer|min:0|max:100',
            'image' => 'file|image|max:' . $max_size
        ];
    }
}
