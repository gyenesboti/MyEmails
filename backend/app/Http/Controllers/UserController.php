<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function signup (Request $request): \Illuminate\Http\JsonResponse
    {
        $fields = $request->validate([
            "name" => "required|string",
            "email" => "required|string|unique:users,email",
            "password" => "required|string|confirmed",
        ]);

        $user = User::query()->create([
            "name" => $fields["name"],
            "email" => $fields["email"],
            "password" => Hash::make($fields["password"]),
            "email_verified_at" => date('Y-m-d H:i:s'),
        ]);

        return response()->json($user, \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    public function login (Request $request): \Illuminate\Http\JsonResponse
    {
        $fields = $request->validate([
            "email" => "required|string",
            "password" => "required|string",

        ]);

        if (Auth::attempt($fields)){
            $user = Auth::user();
            $token = $user->createToken("API token of ". $user["name"])->plainTextToken;
            $content = ["user" => $user, "token" => $token];
            return response()->json($content, 200);
        } else {
            return response()->json("Incorrect email or password!", 401);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
