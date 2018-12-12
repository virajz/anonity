<?php

namespace App\Http\Requests;

use App\Story;
use Illuminate\Foundation\Http\FormRequest;

class StoryForm extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:6|unique:stories,title',
            'body' => 'required|max:15000',
            'genre_id' => 'required|exists:genres,id'
        ];
    }

    public function persist() {
        Story::from(auth()->user())->contribute($this->all());
    }
}
