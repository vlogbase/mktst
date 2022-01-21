<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\Address;
use App\Models\UserDetail;
use App\Models\UserOffice;
use App\Notifications\ForgetPasswordNotification;
use App\Notifications\VerifyNotification;
use App\Notifications\WelcomeNotification;
use App\Traits\AddressHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class AuthController extends ApiController
{
    use AddressHelper;
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'email' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = $request->user();
            if ($user->hasVerifiedEmail()) {
                $token = $user->createToken('savoyAppToken');

                $data =
                    [
                        'token' => $token->plainTextToken,
                        'company_name' => $request->user()->name,
                    ];

                return $this->successResponse($data, 'Login Successful');
            } else {
                return $this->errorResponse('Verification Error!', 403);
            }
        } else {
            return $this->errorResponse('Email or password is wrong!', 403);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return $this->successResponse(Null, 'Logout Successful');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', Password::min(8)->mixedCase()
                ->letters()
                ->numbers(), 'confirmed'],
            'password_confirmation' => 'required',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|min:17|max:17',
            'phone' => 'nullable|min:17|max:17',
            'company_name' => 'required|min:5|max:160',
            'company_select' => 'required|min:10|max:200',
            'vat' => 'nullable|min:5|max:15',
            'registeration' => 'nullable|min:10|max:30',
            'agreement' => 'required',
            'business_type' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }


        $verify_token =  Str::random(64);
        $user = User::create([
            'name' => $request->company_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'vat' => $request->vat,
            'registeration' => $request->registeration,
            'code' => 'SVY-' . Str::random(7),
            'verify_token' => $verify_token
        ]);

        //Adress
        $response = $this->getSelectedAddressDetail($request->company_select);

        $formatted = '';
        foreach ($response->formatted_address as $fra) {
            $formatted = $formatted . $fra;
        }

        $address = Address::create([
            'postcode' => $response->postcode,
            'country' => $response->country,
            'district' => $response->district,
            'county' => $response->county,
            'latitude' => $response->latitude,
            'longitude' => $response->longitude,
            'formatted_address' => $formatted,
        ]);

        UserDetail::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'user_id' => $user->id,
            'address_id' => $address->id,
            'business_type' => $request->business_type,
        ]);

        UserOffice::create([
            'office_name' => 'Registered Office',
            'email' => $request->email,
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'user_id' => $user->id,
            'address_id' => $address->id,
            'is_shipping' => 1,
            'is_billing' => 1,
        ]);

        $registeredUser = [
            'userName' => $request->company_name,
            'actionURL' => config('app.url') . '/verify-email/' . $user->email . '/' . $user->verify_token
        ];

        $user->notify(new WelcomeNotification($registeredUser));

        return $this->successResponse(null, 'Register Successful');
    }

    public function send_verification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }

        $user = User::where('email', $request->email)->firstOrFail();

        if ($user->email_verified_at == NULL) {
            $registeredUser = [
                'userName' => $user->name,
                'actionURL' => config('app.url') . '/verify-email/' . $user->email . '/' . $user->verify_token
            ];

            $user->notify(new VerifyNotification($registeredUser));
            return $this->successResponse(null, 'Verify Email Sent');
        } else {
            return $this->errorResponse('This user already verified', 403);
        }
    }

    public function forget_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $registeredUser = [
            'userName' => $user->name,
            'actionURL' => route('reset_password', ['email' => $user->email, 'token' => $token])
        ];

        $user->notify(new ForgetPasswordNotification($registeredUser));

        return $this->successResponse(null, 'Reset Email Sent');
    }

    public function address_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }

        $response =  $this->getAddressList($request->company_name);
        return $this->successResponse($response, 'Suggessions List');
    }
}
