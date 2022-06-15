<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use SebastianBergmann\Environment\Console;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.authentication.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'registerName' => ['required', 'string', 'max:255'],
            'registerEmail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'registerPassword' => ['required', 'confirmed'],
        ]);

        dd('Registerasi Berhasil');
        // $user = User::create([
        //     'name' => $request->registerName,
        //     'email' => $request->registerNemail,
        //     'password' => Hash::make($request->registerPassword),
        //     'noHp' => $request->registerNoHp,
        //     'email' => $request->registerEmail,
        //     'satker' => $request->registerSatker,
        //     'level' => '0',
        // ]);

        // event(new Registered($user));

        // Auth::login($user);
        
        // return redirect(RouteServiceProvider::HOME);

    }
}
