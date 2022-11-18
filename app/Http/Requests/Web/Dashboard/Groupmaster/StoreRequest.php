<?php

namespace App\Http\Requests\Web\Dashboard\Groupmaster;
use App\Models\Groupmaster;
use App\Models\GroupMasterAdmin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;


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
            'users'  => 'required',

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
        if ($avatar = $this->upload()) {
            $this->groupmaster->image = $avatar;
        }
        $this->groupmaster->save();
        $users = $this->input('users');
        $data = [];
        foreach ($users as $user) {
           $data[] = ['groupmaster_id' => $this->groupmaster->id , 'user_id' => $user];
        }
        GroupMasterAdmin::insert($data);
        return $this;
    }

    protected function data(): array
    {
        return [
            'name'       => $this->input('name'),
            'group_type'       => $this->input('group_type'),
            'image'     => '',
            'status'     => $this->input('status'),
           
        ];
    }

    public function upload($folder = 'images/group', $key = 'image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {

            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
            $image_path = public_path('images/group'); 
            $public_file=request()->file($key);           
            $fileName = explode('/', $file);
            $public_file->move($image_path, $fileName[2]);
        }

        return $file;
    }

    public function getGroup(): Groupmaster
    {
        return $this->groupmaster;
    }
}
