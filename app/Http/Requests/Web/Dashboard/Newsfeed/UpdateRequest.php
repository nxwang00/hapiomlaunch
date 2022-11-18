<?php

namespace App\Http\Requests\Web\Dashboard\Newsfeed;
use App\Models\Newsfeed;
use App\Models\Newsfeed_gallary;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UpdateRequest extends FormRequest
{
    private $newsfeed;

    public $request;

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
        return [
            'textpost'  => 'required',
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
        echo "<pre>"; print_r($this->request->textpost); exit;
        $this->newsfeed = Newsfeed::update($this->data())->where('id', );
        
        // $files = $this->file('image');
        // if(!empty($files)) :
        //     foreach($files as $file) :
        //       $name = time().$file->getClientOriginalName();
        //       Storage::putfile('public/images/newsfeed', $file);
        //       $file->move('public/images/newsfeed', $name);

        //       $data1 = [
        //             'newsfeed_id'     => $this->newsfeed->id,
        //             'image'     => $name,
        //         ];
              
        //       $this->newsfeed_gallary = Newsfeed_gallary::create($data1);

        //     endforeach;
        // endif;
        
        return $this;
    }

    protected function data(): array
    {
        return [
            'user_id'         => Auth::user()->id,
            'text'            => $this->input('textpost'),           
        ];
    }


    public function getPost(): Newsfeed
    {
        return $this->newsfeed;
    }
}
