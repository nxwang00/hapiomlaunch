<?php

namespace App\Http\Requests\Web\Dashboard\GroupUserAdmin;
use App\Models\Groupmaster;
use App\Models\GroupMasterAdmin;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreRequest extends FormRequest
{
    private $groupmaster;

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
            'name'         => 'required|string',
            'image'  => 'required',
            'group_type'  => 'required',
            'status'  => 'required',      
            'amount' => 'exclude_if:group_type,0|required',

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
        $this->groupmaster = Groupmaster::create($this->data());       
        $users = $this->input('users');
        $data = ['groupmaster_id' => $this->groupmaster->id,'User_id' => Auth::user()->id];   
        GroupMasterAdmin::insert($data);
        return $this;
    }

    protected function data(): array
    {
        return [
            'name'       => $this->input('name'),
            'group_type' => $this->input('group_type'),
            'image'      => $this->storeFilesIfExists('image'),
            'status'     => $this->input('status'),
            'amount'     => $this->input('amount'),
            'created_by' => Auth::user()->id,
            'terms_and_condition'     => $this->input('terms_and_condition'),
                      
        ];
    }

    protected function storeFilesIfExists($file_name = ''): string
    {
        if ($this->hasFile($file_name)) {
            $filenameWithExt = $this->file($file_name)->getClientOriginalName();
            $this->file($file_name)->move(public_path('images/group'), $filenameWithExt);
            return $filenameWithExt;         

        } else {
            return 'image.png';
        }
    }  

    public function getGroup(): Groupmaster
    {
        return $this->groupmaster;
    }
}
