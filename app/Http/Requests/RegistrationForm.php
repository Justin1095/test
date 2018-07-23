<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
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

    // Protect itself
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }
    
    // Persist itself
    public function persist()
    {
        //request()->only([''])
        /*
             $user = User::create(
                $this->only(['name', 'email', 'password'])
             ); 
        */
       // Create and save the user.
        $user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        // Sign them in.
        // or use \Request::input
        auth()->login($user);

        // or \Mail
        Mail::to($user)->send(new Welcome($user));
    }
}
