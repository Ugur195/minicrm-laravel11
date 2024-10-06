<?php

namespace App\Http\Requests\Project;

use App\Enums\ProjectStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'user_id' => ['required', Rule::exists('users', 'id')],
            'client_id' => ['required', Rule::exists('clients', 'id')],
            'deadline_at' => ['required', 'date'],
            'status' => ['required', Rule::enum(ProjectStatus::class)],
        ];
    }
}
