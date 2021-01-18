<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

/**
 * We are using Passport and sall to take clien secret and id, Secret..
 */
class Authentication extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return Facade\FlareClient\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            "phone" => "required|string",
            "password" => "required|string",
            "remember" => "",
        ]);
        $user = User::where("phone", $request->phone)->first();
        if ($user === null) {
            $user = $this->register($request->phone, $request->password);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json("unvalid credential.", 402);
        }
        if (
            Auth::attempt(
                ["phone" => $request->phone, "password" => $request->password],
                $request->remember
            )
        ) {
            $token = $request->user()->createToken($user->id);
            return ["token" => $token->plainTextToken];
        }
    }

    /**
     * Undocumented function
     *
     * @param string $phone
     * @param string $password
     * @return \App\Models\User
     */
    public function register(string $phone, string $password)
    {
        $user = new User();
        $user->phone = $phone;
        $user->password = Hash::make($password);
        $user->save();
        return $user;
    }
}
