<?php

namespace App\Http\Requests;

use App\Objects\TaskData;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            '*.id' => 'required|integer',
            '*.value' => 'required|integer',
            '*.estimated_duration' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            '*.id.required' => 'The id field is required.',
            '*.id.integer' => 'The id field must be an integer.',
            '*.value.required' => 'The value field is required.',
            '*.value.integer' => 'The value field must be an integer.',
            '*.estimated_duration.required' => 'The estimated_duration field is required.',
            '*.estimated_duration.integer' => 'The estimated_duration field must be an integer.',
        ];
    }

    /**
     * Gelen veriyi doğrula ve TaskData nesnelerine dönüştür.
     *
     * @param array $data
     * @return TaskData[]
     */
    public function validateTasks(array $data): array
    {
        $validatedData = $this->validate([
            '*.id' => 'required|integer',
            '*.value' => 'required|integer',
            '*.estimated_duration' => 'required|integer',
        ], $this->messages(), $data);

        $dataNew = array_map(function ($item) {
            return new TaskData(
                $item['id'],
                $item['value'],
                $item['estimated_duration']
            );
        }, $validatedData);

        dd($dataNew);
        return $dataNew;
    }
}
