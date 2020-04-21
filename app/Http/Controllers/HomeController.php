<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Contracts\Encryption\DecryptException;

class HomeController extends Controller
{
    public function send(Request $request)
    {
        $tokens = bin2hex(openssl_random_pseudo_bytes(64));
        $newUser = new \App\occulterDB();
        $newUser->name = $request->user_name;
        $newUser->save();

        $encId = base64_encode($newUser->id);
        return redirect('u/' . $encId . '/' . $tokens);
    }
    public function viewUser($encId)
    {
        $dec = base64_decode($encId);
        $getUser = \App\occulterDB::find($dec);

        return view('homepage.userGet', ['getUser' => $getUser]);
    }
    public function clientside($encId)
    {
        $dec = base64_decode($encId);
        $getUser = \App\occulterDB::find($dec);

        return view('homepage.clientside', ['getUser' => $getUser]);
    }
    public function sendclient(Request $request, $encId)
    {
        $dec = base64_decode($encId);
        $getUser = \App\occulterDB::find($dec);
        $messages = new \App\messagesDB();
        $messages->to = $getUser->id;
        $messages->message_thread = $request->messages;
        $messages->gender = $request->gender;
        $messages->name = $request->name;
        $messages->save();

        return back()->with('sukses', 'sukses');
    }
    public function timeline($encId)
    {
        $dec = base64_decode($encId);
        $user = \App\occulterDB::find($dec);
        $getUser = DB::table('occulter')
            ->join('messages', 'occulter.id', '=', 'messages.to')
            ->select('messages.*', 'occulter.*')
            ->where('occulter.id', '=', $dec)
            ->orderBy('messages.created_at', 'DESC')
            ->paginate(3);
        // dd($getUser);
        return view('homepage.timeline', ['getUser' => $getUser, 'user' => $user]);
    }
}
