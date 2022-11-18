<?php

namespace App\Http\Requests\Web\Dashboard\Session;
use App\Models\Session_detail;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Storage;

class StoreRequest extends FormRequest
{
    private $session_details;

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
            'session_name'    => 'required',
            'description'    => 'required',
            'image'    => 'required',
            'session_status'  => 'required',
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
        return [

        ];
    }

    public function persist(): self
    {
        $this->session_detail = Session_detail::create($this->data());       
        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'     => Auth::user()->id,
            'session'     => $this->input('session_name'),
            'description'     => $this->input('description'),
            'image'     => $this->storeFilesIfExists('image'),                
            'session_status'     => $this->input('session_status'),           
        ];
    }


    protected function storeFilesIfExists($file_name = ''): string
    {
        if ($this->hasFile($file_name)) {
            $filenameWithExt = $this->file($file_name)->getClientOriginalName();
            $this->file($file_name)->move(public_path('images/session'), $filenameWithExt);           
            return $filenameWithExt;          

        } else {
            return 'image.png';
        }
    }

    public function geSession(): Session_detail
    {
        return $this->session_detail;
    }
}
