<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/selectAll1', function(){
    $users = User::all();

    foreach($users as $user){
        echo $user->name;
    }
    dd($users);
});

Route::get('/selectAll2', function(){
    $users = User::where('id', 1)->get();

    foreach($users as $user){
        echo $user->name;
    }
    dd($users);
});

Route::get('/selectAll3', function(){
    $user = User::where('id', 20)->first();

        dd($user->email);
});

Route::get('/selectAll4', function(){
    $users = User::where('id', '>=', 10)->get();

    foreach($users as $user){
        echo $user->name;
    }
    dd($users);
});

Route::get('/selectAll5', function(){
    $user = User::find(10);

    dd($user);
});

Route::get('/select', function () {
    // $users = User::all();
    // $users = User::where('id', 1)->get();
    // $user = User::where('id', 10)->first();
    // $user = User::first();
    // $user = User::find(101);
    // $user = User::findOrFail(request('id'));

    // Buscar o primeiro usuário que corresponde ao nome fornecido na requisição e lançar uma exceção se não for encontrado
    $user = User::where('name', request('name'))->firstOrFail();

    $user = User::firstWhere('name', request('name'));

    if (!$user) {
        // Tratar o caso em que o usuário não foi encontrado
        abort(404, 'User not found');
    }

// Exibir o usuário encontrado
dd($user);

    // Dump and die - exibe o conteúdo da variável $user e interrompe a execução do script
    dd($user);
});


Route::get('/', function () {
    return view('welcome');
});
