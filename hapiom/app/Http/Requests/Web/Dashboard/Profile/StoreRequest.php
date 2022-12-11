<?php

namespace App\Http\Requests\Web\Dashboard\Profile;
use App\Models\Userinfo;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Storage;


class StoreRequest extends FormRequest
{
    private $userinfo;

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
            'first_name'    => 'required',
            'last_name'    => 'required',
            'email'    => 'required',
            // 'website'    => 'required',
            // 'datetimepicker'    => 'required',
            // 'phone_number'    => 'required',
            // 'country'    => 'required',
            // 'state'    => 'required',
            // 'city'    => 'required',
            // 'description'    => 'required',
            // 'birth_place'    => 'required',
            'gender'    => 'required',
            // 'occupation'    => 'required',
            'marriage_status'    => 'required',
            // 'facebook_url'    => 'required',
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
        $data1 = [
            'first_name'     => $this->input('first_name'),
            'last_name'     => $this->input('last_name'),
            'email'     => $this->input('email'),
        ];

        $update = User::where('id', '=', Auth::user()->id)->update($data1);
        $userinfo = Userinfo::where('user_id',Auth::user()->id)->get()->count();
        if($userinfo > 0){

           $this->userinfo = Userinfo::where('user_id', '=', Auth::user()->id)->update($this->data());


           if ($avatar = $this->upload()) {
            $this->userinfo = Userinfo::where('user_id', '=', Auth::user()->id)->update(array('profile_image' => $avatar));
        
            // $this->userinfo->profile_image = $avatar;
            }

        
        }else{

            $this->userinfo = Userinfo::create($this->data());
        }

        return $this;
    }

    protected function data(): array
    {

        $data = [
            'user_id'     => Auth::user()->id,
            'website'     => $this->input('website'),
            'dob'     => $this->input('dob'),
            'phone_number'     => $this->input('phone_number'),
            'country'     => $this->input('country'),
            'state'     => $this->input('state'),
            'city'     => $this->input('city'),
            'description'     => $this->input('description'),
            'birth_place'     => $this->input('birth_place'),
            'gender'     => $this->input('gender'),
            'occupation'     => $this->input('occupation'),
            'marriage_status'     => $this->input('marriage_status'),
            'facebook_url'     => $this->input('facebook_url'),
            'status' => $this->input('status') ? $this->input('status') : 0
        ];

        return $data;
    }

    public function upload($folder = '', $key = 'profile_image', $validation = 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048|sometimes')
    {
        request()->validate([$key => $validation]);
        $file = null;
        if (request()->hasFile($key)) {

            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
            $image_path = public_path('images/profile'); 
            $public_file=request()->file($key);           
            $fileName = explode('images/', $file);
            $public_file->move($image_path, $fileName[0]);
        }

        return $file;
    }

    public function getProfile(): Userinfo
    {
        return Userinfo::where('user_id',Auth::user()->id)->first();
    }
}
