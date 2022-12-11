<?php

namespace App\Http\Requests\Web\Dashboard\Event;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StoreRequest extends FormRequest
{
    private $event;

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
            'event_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }

    public function persist(): self
    {
        $this->event = Event::create($this->data());

        return $this;
    }

    protected function data(): array
    {
        $file = $this->file('event_image');
        if (!empty($file)) {
            $name = time() . $file->getClientOriginalName();
            Storage::putfile('images/event', $file);
            $file->move('images/event', $name);

            return [
                'ename' => $this->input('event_name'),
                'image' => $name,
                'group_id' => $this->input('event_group'),
                'hoster_id' => $this->input('event_hoster'),
                'creater_id' => Auth::id(),
                'description' => $this->input('event_description'),
                'start_date' => $this->input('start_date'),
                'end_date' => $this->input('end_date'),
                'location' => $this->input('event_location'),
                'status' => 0,
                'visible' => 0
            ];
        }
    }

    public function getEvent(): Event
    {
        return $this->event;
    }
}
