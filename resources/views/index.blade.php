<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact Management</title>

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
        <div class="navbar bg-base-100">
          <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl">Contacts</a>
          </div>
          <div class="flex-none">
            <button>
              
                <a class="font-medium p-1  text-[#002D4B] bg-white" href="{{ route('contacts.create') }}">New contact</a>

            </button>
          </div>
        </div>
        
        
        <div class="overflow-x-auto">
          <table class="table">
            <!-- head -->
            <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- row 1 -->
              @foreach ($contacts as $contact)
              <tr>
                <th>{{ $contact->id }}</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->contact }}</td>
                <td>{{ $contact->email }}</td>
                <td>
                    <details class="dropdown dropdown-left dropdown-end p-6">
                                        <summary class="btn m-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                            </svg>
                                        </summary>

                                        <ul class="menu dropdown-content bg-base-100 rounded-box z-[1] w-52 p-1 shadow">
                                            
                                            <li>
                                                <a href="{{ route('contacts.edit',$contact->id) }}">Edit contact</a>
                                            </li>
                                            <li>
                                            
                                                <label for="modal-deletar-usuario-{{ $contact->id }}">
                                                    Delete contact
                                                </label>
                                                
                                            </li>
                                            <li>
                                            
                                                <label for="modal-view-usuario-{{ $contact->id }}">
                                                    View contact
                                                </label>
                                                
                                            </li>
                                        </ul>
                                    </details>
                </td>
              </tr>
              
                            <input type="checkbox" id="modal-deletar-usuario-{{ $contact->id }}" class="modal-toggle" />

                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Delete</h3>
                                            <p class="py-4">Are you sure you want to delete                                                {{ $contact->name }}?</p>
                                            <div class="modal-action">

                                                <form action="{{ route('contacts.delete', $contact->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="outline-0 bg-[#002D4B] p-4 w-auto rounded shadow text-white font-medium w-full hover:bg-blue-800" type="submit">Yes</button>

                                                </form>
                                                <label for="modal-deletar-usuario-{{ $contact->id }}" class="btn">Close</label>
                                            </div>

                                        </div>
                                    </div>
                                    <input type="checkbox" id="modal-view-usuario-{{ $contact->id }}" class="modal-toggle" />

                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold"> {{ $contact->name }}</h3>
                                            <p class="py-4">{{ $contact->contact }}</p>
                                            <p class="py-4">{{ $contact->email }}</p>
                                            <div class="modal-action">
                                                <label for="modal-view-usuario-{{ $contact->id }}" class="btn">Close</label>
                                            </div>

                                        </div>
                                    </div>
              @endforeach
              
            </tbody>
          </table>
        </div>
    </body>
</html>