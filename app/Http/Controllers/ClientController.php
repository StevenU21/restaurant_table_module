<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('user')->latest()->paginate(5);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $client = new Client();
        $user = new User();
        $client->user()->associate($user);
        return view('clients.create', compact('client', 'user'));
    }

    public function store(ClientRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $client = Client::create($request->validated() +
        [
            'user_id' => $user->id,
        ]);
        
        return response()->json(['success' => 'Cliente creado correctamente'], 200);
    }

    public function edit(Client $client)
    {
        $client->load('user');
        return view('clients.edit', compact('client'));
    }

    public function show(Client $client)
    {
        $client->load('user');
        return view('clients.show', compact('client'));
    }
}
