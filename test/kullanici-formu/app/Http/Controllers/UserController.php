<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash; 

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Formu göstermek için
    public function create()
    {
        return view('register'); 
    }

    
  // Kayıt işlemini yapma
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ], [
        'password.min' => 'Şifre en az 8 karakter olmalıdır.',
        'email.unique' => 'Bu e-posta adresi zaten alınmış.',
    ]);
    
    

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    
    return redirect()->route('register')->with('success', 'Kullanıcı başarıyla oluşturuldu.');
}

    


    

    
}
