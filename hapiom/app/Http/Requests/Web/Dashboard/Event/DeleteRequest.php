<?php

namespace App\Http\Requests\Web\Dashboard\Event;

use App\Models\Event;
use Illuminate\Http\Request;
use Auth;

class DeleteRequest
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
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
        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
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
        $eventId = $this->request->eventId;
        $this->event = Event::findOrFail($eventId);
        $this->event->delete();
        return $this;
    }

    public function getEventMsg(): array
    {
        return ['message' => 'The event has been trashed successfully'];
    }
}
