<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function customer_create(): View
    {
        $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
        $cartItems = $cartQuantity->sum('quantity');
        return view('users.auth.register',['cartItems'=>$cartItems]);
    }

//    public function customer_store(Request $request): RedirectResponse
//    {
//
//
//        $request->validate([
//            'g-recaptcha-response' => 'required',
//            'name' => ['required', 'string', 'max:255'],
//            'user_name' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//        ]);
//
//
//        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
//            'secret' => env('RECAPTCHA_SECRET_KEY'),
//            'response' => $request->input('g-recaptcha-response'),
//            'remoteip' => $request->ip(),
//        ]);
//
//        if (!$response->json('success')) {
//            return back()->withErrors(['captcha' => 'reCAPTCHA verification failed.']);
//        }
//
//
//        if ($request->p_num != null){
//            $user = User::create([
//                'name' => $request->name,
//                'user_name' => $request->user_name,
//                'role' => 'customer',
//                'p_num' => $request->p_num,
//                'password' => Hash::make($request->password),
//            ]);}
//        else{
//            $user = User::create([
//                'name' => $request->name,
//                'user_name' => $request->user_name,
//                'role' => 'customer',
//                'password' => Hash::make($request->password),
//            ]);
//            }
//
//
//
//        event(new Registered($user));
//
//        Auth::login($user);
//
//        return redirect()->route('welcome');
//    }

    public function customer_store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'p_num' => ['nullable', 'regex:/^09\d{9}$/', 'unique:users,p_num'],
        ]);

        $userData = [
            'name' => $request->name,
            'user_name' => $request->user_name,
            'role' => 'customer',
            'password' => Hash::make($request->password),
        ];

        if ($request->filled('p_num')) {
            $userData['p_num'] = $request->p_num;
        }

        $user = User::create($userData);

        event(new Registered($user));

        Auth::login($user);
        session()->flash('status', __('messages.account_created'));

        return redirect()->route('welcome');
    }

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
            'g-recaptcha-response' => ['recaptcha'],
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function checkUser(Request $request)
    {
        $exists = User::where('user_name', $request->login)->orWhere('p_num', $request->login)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function sendCode(Request $request)
    {
        $identifier = $request->input('login');
        $isPhone = preg_match('/^09\d{9}$/', $identifier);

        if ($isPhone) {
            if (User::where('p_num', $identifier)->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => __('messages.phone_already_registered'),
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => __('messages.sms_login_disabled'),
            ]);

        } else {
            $user = User::where('user_name', $identifier)->first();
            if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => __('messages.username_exists_login'),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => __('messages.username_not_exists_register'),
                ]);
            }
        }











    }

    public function verifyCode(Request $request)
    {
        return response()->json([
            'success' => false,
            'message' => __('messages.sms_login_disabled_short'),
        ]);
    }


}
