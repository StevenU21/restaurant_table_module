<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('user')->paginate(5);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $client = new Client();
        $user = new User();
        $client->user()->associate($user);
        return view('clients.create', compact('client', 'user'));
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
