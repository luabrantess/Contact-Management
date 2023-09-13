<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
            <div>
                @if ($errors->any())
                <div class="max-w-2xl mx-1">
                    <div class="alert alert-error my-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                      </svg>
                    <p>Erro na criação do contato.</p>
                </div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><span class="text-error-content bg-error my-2 p-1">{{ $error }}</span></li>
                    @endforeach
                </ul>
                </div>
                @endif
        
        
            <form action="{{ route('contacts.update', $contact->id ) }}" method="POST" enctype="multipart/form-data"">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
                <div class="form p-4 ">
                    <div class="flex-1">
                        <div class="grid mt-5 mb-3">
                        
                        <a class=" normal-case text-2xl font-bold text-[#002D4B]">Edit</a>
                    
                        </div>
                    </div>
        
                    <div class="flex gap-2 p-10 mx-auto rounded-lg">
        
                        <div class='grid w-full bg-gray-200 p-10  rounded-xl gap-3'>
            
                            <div class="grid w-full">
                                <label for="nome" class="font-medium">Full name</label>
                                <input placeholder="" maxlength="255" minlength="5" value="{{ $contact->name }}" name="name" type="text" title="Escreva no mínimo 5 caracteres" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('name') ?  'input input-bordered input-error' : '' }}" />
                            </div>
            
                            <div class="grid w-full">
                                <label class="font-medium">Contact</label>
                                <input placeholder="" type="text" name="contact" value="{{ $contact->contact }}" minlength="9" maxlength="9"  class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('contact') ?  'input input-bordered input-error' : '' }}" />
                            </div class=>
                            <div class="grid w-full">
                                <label class="font-medium">Email</label>
                                <input placeholder="" type="email" name="email" value="{{ $contact->email }}" class="bg-gray-50 outline-0 rounded shadow p-2 {{ $errors->has('email') ?  'input input-bordered input-error' : '' }}" />
                               </div>
                               
                              <div class="text-center w-full mt-7">
                                <button type="submit" class="outline-0 bg-[#002D4B] p-2 w-full p-4 rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Salvar</button>
                            </div>
                            
                        </div>
                            
                        
            
                    </div>
                
        
            </form>
        </div>

    </body>
</html>