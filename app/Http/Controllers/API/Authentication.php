<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
     * @return void
     */
    public function login(Request $request)
    {
        $request->validate([
            "username" => "required|string",
            "password" => "required|string",
        ]);

        $http = new \GuzzleHttp\Client();

        try {
            $response = $http->post(URL::to("/oauth/token"), [
                "form_params" => [
                    "grant_type" => "password",
                    "client_id" => env("PASSPORT_PERSONAL_ACCESS_CLIENT_ID"),
                    "client_secret" => env("PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET"),
                    "phone" => $request->phone,
                    "password" => $request->password,
                    "scope" => "*",
                ],
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $th) {
            if ($th->getCode() === 400) {
                return response()->json(
                    "Invalid Request. Please enter a username and password",
                    $th->getCode()
                );
            }
            if ($th->getCode() === 401) {
                return response()->json(
                    "Your credentials are incorrect. Please try again.",
                    $th->getCode()
                );
            }
            return response()->json("Something went wrong in server.", $th->getCode());
        }
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $request->validate([
            "phone" => ["required", "string", "max:12", "unique:users"],
            "password" => ["required", "string", "min:6"],
        ]);
        return \App\Models\User::create([
            "phone" => $request->phone,
            "password" => Hash::make($request->password),
        ]);
    }
}
