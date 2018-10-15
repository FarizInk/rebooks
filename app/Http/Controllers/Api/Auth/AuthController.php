<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Account\UserLoginRequest;
use App\Http\Requests\Account\UserRegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendVerificationEmail;
use Illuminate\Foundation\Auth\ResetsPasswords;


class AuthController extends Controller
{
    /**
    * Resource name
    *
    * @var string
    */
    const RESOURCE_NAME = "akun";

    /**
     * Define User Entities Instance
     *
     * @var User
     */
    protected $user;
    use ResetsPasswords;
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Process user login request
     *
     * @param UserLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate (UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(Auth::user());
        }
        return response()->json('Invalid Credentials', 401);
    }

    /**
     * Process user register request
     *
     * @param UserRegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register (UserRegisterRequest $request)
    {
        $data = $request->only('name', 'username', 'email', 'password', 'address', 'phone', 'gender', 'city_id', 'img', 'email_token');
        $Namagambar = time().'.'.request()->img->getClientOriginalExtension();
        request()->img->move(public_path('images/profile'), $Namagambar);
        $registered = $this->user->create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'city_id' => $data['city_id'],
            'img' => $Namagambar,
            'email_token' => base64_encode($data['email'])
        ]);

        if ($registered) {
            // $credentials = $request->only('email', 'password');
            // Auth::attempt($credentials);
            dispatch(new SendVerificationEmail($registered));
            // return success_response()->resources(Auth::user());
            return response()->json('Silahkan Cek Email Anda', 200);
        }
        return response(self::RESOURCE_NAME)->create();
    }

    public function logout()
    {
        Auth::logout($this->user);
    }
}