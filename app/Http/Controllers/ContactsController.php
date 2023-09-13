<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Carbon\Carbon;

class ContactsController extends Controller
{

    // Exibe uma lista dos contatos cadastrados
    public function index()
    {
        $contacts = Contacts::get();
        return view('index', ['contacts' => $contacts]);

    }

    // Exibe formulário para criar novo contato
    public function create()
    {
        return view('create');
    }

    // Exibe o formulário para edição do contato
    public function edit(Contacts $contact)
    {

        return view('edit', ['contact' => $contact]);

    }

    public function update(Request $request, Contacts $contacts)
    {

        $this->save($request, $contacts);
        return redirect()->route('contacts.index')
        ->with('success','Updated!');

    }

    public function delete(Contacts $contact)
    {
        
        $contact->delete();
        

        return redirect()->route('contacts.index')
        ->with('success', 'Deleted!');

    }
    


    // Faz a gravação do contato no Banco de dados
    public function store(Request $request)
    {
        $this->save($request);
        return redirect()->route('contacts.index')->with('success','Done!');
    }

    public function save($request, $contatoAtualizado = null)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required',
            'contact' => 'required|min:9|max:9',
        ]);

        $contacts = $contatoAtualizado ?? new Contacts(); // Se for atualização, recebe o contato que vai ser atualizado

        $contacts->name = $validated['name'];
        $contacts->email = $validated['email'];
        $contacts->contact = $validated['contact'];
        

        $contacts->save();
    }
}