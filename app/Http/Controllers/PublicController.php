<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller  implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['home'])
        ];
    }

    public function home()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('home', compact('articles'));
    }

    public function careers()
    {

        return view('careers');
    }
    public function careersSubmit(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',

        ]);

        $user = Auth::user();
        $role = $request->role;
        $message = $request->message;
        $email = $request->email;
        $info = compact('role', 'email', 'message');

        Mail::to('admin@thelolstreetjournal.it')->send(new CareerRequestMail($info));

        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;
            case 'revisor':
                $user->is_revisor = NULL;
                break;
            case 'writer':
                $user->is_writer = NULL;
                break;
        }

        $user->update();
        return redirect( route('home'))->with('message', 'Richiesta inviata con successo');
    }
}
