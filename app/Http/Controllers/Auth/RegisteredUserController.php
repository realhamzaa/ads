<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'username' => ['required','string','lowercase','max:30','min:4','unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation'=>['required'],
            'terms' =>['accepted']
        ],[
            'required'=>'! هذا الحقل مطلوب',
            'name.max'=>'الإسم طويل جداً',
            'email.email'=>'! يرجى إدخال بريد إالكرتوني صالح ',
            'email.unique'=>'! هذا البريد الإلكتروني مستخدم بالفعل',
            'username.max'=>'! لقد تخطيت الحد الأقصى لطول إسم المستخدم',
            'username.min'=>'! الحد الأدنى هو 4 حروف لإسم المستخدم',
            'username.unique'=>'! إسم المستخدم غير متاح أو مستخدم بالفعل'

        ]
    
    );

        $user = User::create([
            'name' => $request->name,
            'username' =>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
