<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\Contact;

class AuthController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        foreach ($contacts as $contact) {
        $contact->category_content = $contact->category ? $contact->category->content : '不明';
    }
    return view('admin',compact('contacts'));
}
}

