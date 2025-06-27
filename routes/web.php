<?php

use App\Models\Aula;
use App\Models\Contato;
use App\Models\Recursos;
use App\Models\User;
use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

// Tela de cadastro
Route::get('/criar-conta', function () {
    return view('criar-conta');
});

// Salva usuário
Route::post('/salva-conta', function (Request $request) {
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password); // senha criptografada
    $user->save();

    return redirect(route('login')); // redireciona ao login
})->name('salva-conta');

// Tela de login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Validação de login
Route::post('/logar', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'email' => 'O email e senha digitados não são válidos',
    ])->onlyInput('email');
})->name('logar');

// Dashboard (pós login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// Rotas de teste
Route::get('/teste', function () {
    return 'O código foi testado';
});

Route::get('/usuario/{nome}', function ($nome) {
    return 'o usuário atual é:'.$nome;
});

Route::get('/soma/{num1}/{num2}', function ($num1, $num2) {
    return 'a soma é: ' . $num1 + $num2;
});

Route::get('/divisão/{num1}/{num2}', function ($num1, $num2) {
    return 'a divisão é: '.$num1 / $num2;
});

Route::get('/subtração/{num1}/{num2}', function ($num1, $num2) {
    return 'a subtração é: '.$num1 - $num2;
});

Route::get('/multiplicação/{num1}/{num2}', function ($num1, $num2) {
    return 'a multiplicação é: '.$num1 * $num2;
});

Route::get('/cadastra-equipe', function () {
    return view('cadastra-equipe');
})->name("cadastra-equipe")->middleware('auth');

Route::post('/logout', function (Request $request) {
   
        Auth::logout();
        $request->session()->regenerate();
        return redirect('/');
    
})->name('logout');

Route::post('/salva-equipe', function (Request $request){
//dd($request);
$equipe = new Equipe(); 
$equipe->nome = $request->nome;
$equipe->email = $request->email;
$equipe->formacao = $request->formacao;
$equipe->experiencia = $request->experiencia;
$equipe->save();

return "Equipe salva com sucesso!!";

})->name('salva-equipe')->middleware('auth');

Route::get('/lista-aula', function () {
    $aula = Aula::all();
    return view('lista-aula', compact('aula'));
})->name("lista-aula");

Route::post('/salva-aula', function (Request $request){
//dd($request);
$aula = new Aula(); 
$aula->nome = $request->nome;
$aula->periodo = $request->periodo;
$aula->professor = $request->professor;
$aula->qtdAulas = $request->qtdAulas;
$aula->save();

return "Aula salva com sucesso!!";

})->name('salva-aula')->middleware('auth');

Route::get('/cadastra-aula', function () {
    return view('cadastra-aula');
})->name("cadastra-aula")->middleware('auth');


Route::get('/lista-equipe', function () {
    $equipe = Equipe::all();
return view('lista-equipe', compact('equipe'));

})->name("lista-equipe");

Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

Route::get('/recursos', function () {
    $recursos = Recursos::all();
    return view('recursos', compact('recursos'));
})->name('recursos');

// Exibe o formulário
Route::get('/fale-conosco', function () {
    return view('fale-conosco');
})->name('fale-conosco');

// Processa o envio
Route::post('/enviar-contato', function (Request $request) {
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email',
        'mensagem' => 'required|string'
    ]);

    $contato = new Contato();
    $contato->nome = $request->nome;
    $contato->email = $request->email;
    $contato->mensagem = $request->mensagem;
    $contato->save();

    return redirect()->route('fale-conosco')->with('success', 'Mensagem enviada com sucesso!');
})->name('enviar-contato');


