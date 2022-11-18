<?php

namespace App\Http\Controllers\Web\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Meberships;


class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        return view('dashboard.pages.auth.login');
    }

    public function adminLoginForm()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        $levels = Meberships::where('levelstatus',1)->get();
        return view('dashboard.pages.auth.admin-login', compact('levels'));
    }

    public function userLoginForm()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        return view('dashboard.pages.auth.user-login');
    }

    /**
     * Login the admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validator($request);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            //Authentication passed...
            $role_id = Auth::user()->role_id;
            if (Auth::user()->block == 0 ) {
                if ($role_id == 1) {
                    Session::flush();
                    Auth::logout();
                    return Redirect('super-admin-login')->with('error','Your account has been blocked please contact hapiom.');
                } else if ($role_id == 2) {                   
                    Session::flush();
                    Auth::logout();
                    return Redirect('admin-login')->with('error','Your account has been blocked please contact hapiom.');
                } else {
                    Session::flush();
                    Auth::logout();
                    return Redirect('user-login')->with('error','Your account has been blocked please contact hapiom.');
                }
            }
            else if ( User::where('id',Auth::user()->customer_id )->value('block') == 0 && $role_id == 3)
            {
                Session::flush();
                Auth::logout();
                return Redirect('user-login')->with('error','Your account has been blocked please contact hapiom.');
            }
            return redirect()
                ->intended('dashboard')
                ->with('status', 'You are Logged in as Admin!');
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    public function userRegistration(Request $request)
    {  
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'optionsCheckboxes' => 'required',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        flashWebResponse('message', 'Registration successfully.! please login your credentials.');
        return back();
        // return back()->withErrors(['These credentials do not match our records.']);
        // return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'name' => $data['first_name'].' '.$data['last_name'],
        'email' => $data['email'],
        'role_id' => $data['role'],
        'password' => Hash::make($data['password'])
      ]);
    }   

    /**
     * Logout the admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function signOut() {
        if (Auth::user()->role_id == 1) {
            Session::flush();
            Auth::logout();
            return Redirect('super-admin-login');
        } else if (Auth::user()->role_id == 2) {
            Session::flush();
            Auth::logout();
            return Redirect('admin-login');
        } else {
            Session::flush();
            Auth::logout();
            return Redirect('user-login');
        }
            
    }

    /**
     * Validate the form data.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:users|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
        return back()->withErrors(['These credentials do not match our records.']);
        return redirect()
            ->route('login')
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }
}
