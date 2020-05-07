<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Cooperative;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegistrationFormRequest;
use App\Mail\EmailVerification;
use App\PhoneNumber;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class APIController extends Controller
{
    /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;
        // attempt to log the user in.
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ]);
        }

        // check if this account is deleted.
        if (Auth::user()->is_deleted) {
            return response()->json([
                'success' => false,
                'message' => 'this account is Deleted',
            ]);
        }

        // check if this account is activated.
        if (!Auth::user()->is_activated) {
            return response()->json([
                'success' => false,
                'message' => 'this acount\'s email is not activated yet .  ',

            ]);
        }

        // when everything goes smooth.
        return response()->json([
            'success' => true,
            'token' => $token,
            'Role' => Auth::user()->role->name
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            $role = Auth::user()->role->name;
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => $role . ' logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    /**
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationFormRequest $request, $type)
    {


        if (count(User::all()->where("email", $request->email)) != 0) {
            response()->json([
                'success'   =>  false,
                'message'      =>  "email already been taken"
            ], 401);
        }

        $user = null;

        if ($type == 'user') {
            $user = $this->registerNewUser($request);
        } else if ($type == "seller") {
            $user = $this->registerNewSeller($request);
        }

        if ($user == null) return ['something went wrong'];

        Mail::to($user->email)->send(new EmailVerification($user->remember_token, $user->name));

        // if ($this->loginAfterSignUp) {
        //     return $this->login($request);
        // }

        return response()->json([
            'success'   =>  true,
            'data'      =>  $user,
            'type'      =>  $type,
            'Message'   => "you have been signed up as a " . $user->role->name . " sucessfuly",
        ], 200);
    }

    public function verify($token = null)
    {
        if ($token == null) return ["no token was provided"];

        $user = User::where("remember_token", $token)->first();

        if ($user == null) return ["no user was found"];
        if ($user->is_deleted) return ["user was deleted"];
        if ($user->email_verified) return ["email already verified"];


        $user->ActivateUser();
    }

    private function registerNewSeller(RegistrationFormRequest $request)
    {
        $coop  = new Cooperative();
        $coop->store($request->cooperative);

        $user = new User;
        $user->newSeller($request, $coop->id);

        foreach ($request->PhoneNumbers as $phoneNumber) {
            $phone = new PhoneNumber();
            $phone->store($phoneNumber, $user->id);
        }
        foreach ($request->Adresses as $newAdress) {
            $adress = new Adress();
            $adress->store($newAdress, $user->id);
        }
        return $user;
    }

    private function registerNewUser(RegistrationFormRequest $request)
    {
        $request->validate([
            "email" => "required",
            "name" => "required",
            "password" => "required"
        ]);

        $user = new User;
        $user->newUser($request);

        foreach ($request->PhoneNumbers as $phoneNumber) {
            $phone = new PhoneNumber();
            $phone->store($phoneNumber, $user->id);
        }

        foreach ($request->Adresses as $newAdress) {
            $adress = new Adress();
            $adress->store($newAdress, $user->id);
        }

        return $user;
    }
}
