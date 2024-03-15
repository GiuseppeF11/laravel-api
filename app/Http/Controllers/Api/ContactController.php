<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

//Models
use App\Models\Contact;

//Requests
use App\Http\Requests\Auth\Contact\StoreContactRequest;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Contatto salvato con successo',
        ]);
    }
}
