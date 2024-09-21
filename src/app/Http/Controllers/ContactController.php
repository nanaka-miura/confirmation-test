<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(['last-name','first-name','gender','email','tel1','tel2','tel3','address','address-building','category','content']);
        return view('confirm',['contact' => $contact]);
    }
}
