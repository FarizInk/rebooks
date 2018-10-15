<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\City;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendVerificationEmail;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cities = City::orderBy('name', 'asc')->get();
        $verified = Auth::user()->verified;
        $data = [
            'cities' => $cities,
            'verified' => $verified
        ];
        return view('dashboard.profile', $data);
    }

    protected function validatorProfile(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:180',
            'address' => 'required',
            'phone' => 'required|min:10|numeric',
            'gender' => 'required',
            'city_id' => 'required',
        ]);
    }
    protected function validatorEmail(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:180|unique:users',
        ]);
    }
    protected function validatorPassword(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    protected function validatorPhoto(array $data)
    {
        return Validator::make($data, [
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:ratio=1',
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $this->validatorPhoto($request->all())->validate();
        $id = Auth::user()->id;
        $user = User::find($id);
        $userImg = $user->img;
        File::delete(public_path() . '/images/profile/' . $userImg);
        $image = $request->img;
        $filename = time().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('images/profile'), $filename);
        // $filename  = time() . '.' . $image->getClientOriginalExtension();
        // $path = public_path('images/profile/' . $filename);
        // $img = Image::make($image->getRealPath());
        // $img->fit(200)->save($path);
        // $img->resize(200, 200)->save($path);
        $user->img = $filename;
        $user->save();
        return redirect()->route('dashboard.profile')->with('response', 'Update foto berhasil!');
    }

    public function update(Request $request)
    {
        $this->validatorProfile($request->all())->validate();
        $id = Auth::user()->id;
        User::where('id', $id)->update($request->except(['_token', 'username', 'email', 'password', 'img']));
        return redirect()->route('dashboard.profile')->with('response', 'Update profile Berhasil!');
    }

    public function updateEmail(Request $request)
    {
        $this->validatorEmail($request->all())->validate();
        $id = Auth::user()->id;
        $user = User::find($id);
        if ($user->email != $request->email) {
            $user->email = $request->email;
            $user->verified = 0;
            $user->save();
            dispatch(new SendVerificationEmail($user));
            return redirect()->route('dashboard.profile')->with('response', 'Silahkan cek email anda.');
        } else {
            return redirect()->route('dashboard.profile')->with('response', 'Email harus beda.');
        }
    }

    public function updatePassword(Request $request)
    {
        $this->validatorPassword($request->all())->validate();
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	$user->password = bcrypt($request->password);
    	$user->save();
    	return redirect()->route('dashboard.profile')->with('response', 'Password berhasil dirubah!');
    }

    public function verify()
    {
    	$id = Auth::user()->id;
        $user = User::find($id);
        dispatch(new SendVerificationEmail($user));
		return redirect()->route('dashboard.profile')->with('response', 'Silahkan cek email anda.');
    }
}
