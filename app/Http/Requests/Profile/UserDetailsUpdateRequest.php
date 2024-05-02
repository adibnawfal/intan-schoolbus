<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailsUpdateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['nullable', 'string', 'max:255'],
      'status' => ['nullable', 'string', 'max:255'],
      'gender' => ['nullable', 'string', 'max:255'],
      'phone_no' => ['nullable', 'string', 'max:255'],
      'bio' => ['nullable', 'string', 'max:255'],
    ];
  }
}