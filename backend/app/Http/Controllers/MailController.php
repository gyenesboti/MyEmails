<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function getSentMails (int $id): \Illuminate\Support\Collection
    {
        return Mail::query()
            ->select("mails.*", "users.id as userID", "users.name")
            ->Join("users" , "mails.id_user_to", "=", "users.id")
            ->where("mails.id_user_from", "=", $id)
            ->orderBy("mails.sent", "desc")
            ->get();
    }

    public function allMails (int $id): \Illuminate\Database\Eloquent\Collection|array
    {
        return Mail::query()
            ->select("mails.*", "users.id as userID", "users.name")
            ->join("users", "mails.id_user_from", "=", "users.id")
            ->where("mails.id_user_to", "=", $id)
            ->get();
    }

    public function getMailForRead (int $id)
    {
        Mail::query()
            ->where("mails.id", "=", $id)
            ->update(["is_read" => true]);

        return Mail::query()
            ->select("mails.*", "users.id as userID", "users.name")
            ->join("users", "mails.id_user_from", "=", "users.id")
            ->where("mails.id", "=", $id)
            ->get()
            ->first();
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
