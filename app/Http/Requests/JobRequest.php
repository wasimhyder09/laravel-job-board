<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array {
    return [
      'title' => 'required|max:255|string',
      'location' => 'required|max:255|string',
      'salary' => 'required|min:0000|numeric',
      'description' => 'required|string',
      'experience' => 'required|in:'.implode(',', Job::$experience),
      'category' => 'required|in:'.implode(',', Job::$category),
    ];
  }
}
