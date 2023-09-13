<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Lista de contatos cadastrados no sistema
Route::get('/', [ContactsController::class, 'index'])->name('contacts.index');


// Abre a página de formulário para cadastrar um novo contato
Route::get('/contato/create', [ContactsController::class, 'create'])->name('contacts.create');

// Função que grava no banco de dados o novo contato
Route::post('/contato/post/contato', [ContactsController::class, 'store'])->name('contacts.store');

// Abre a página de formulário de edição do contato
Route::get('/contato/edit/{contact}', [ContactsController::class, 'edit'])->name('contacts.edit');

// Função que atualiza no banco de dados o contato
Route::put('/contato/update/{contacts}', [ContactsController::class, 'update'])->name('contacts.update');

// Função que apaga no banco de dados o contato
Route::delete('/contato/delete/{contact}', [ContactsController::class, 'delete'])->name('contacts.delete');