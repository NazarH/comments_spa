<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\User;

class CommentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['required', 'string', 'min:3','max:15'],
            'email' => ['required', 'string', 'min:11', 'max:30'],
            'text' => ['required', 'string', 'min:2', 'max:1000'],
            'url' => ''
        ];
    }
}
