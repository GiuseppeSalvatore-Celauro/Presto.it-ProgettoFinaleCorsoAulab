<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function removeRevisor(User $user){

        if ($user->is_revisor) {
            $user->update(
                [
                    $user->is_revisor = false,
                ]
            );
            return redirect()->route('admin.index')->with('message', "L'utente non è più un revisore");
        }else{
            return redirect()->route('admin.index')->with('message', "L'utente non è un revisore");
        }
    }

    public function adminNewRevisorAccepted(User $user){
        Artisan::call('AttoZetta:is_revisor', ['email'=>$user->email]);
        return redirect()->route('admin.index')->with('message', "L'utente adesso è un revisore");
    }
}
