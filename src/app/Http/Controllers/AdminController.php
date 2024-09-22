<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->paginate(7);

        foreach ($contacts as $contact) {
        $contact->category_content = $contact->category ? $contact->category->content : '不明';
        }

        $categories = Category::all();

        return view('admin', compact('contacts','categories'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)
        ->GenderSearch($request->gender)
        ->DateSearch($request->date)
        ->KeywordSearch($request->keyword)
        ->paginate(7);

        foreach ($contacts as $contact) {
        $contact->category_content = $contact->category ? $contact->category->content : '不明';
        }

        $categories = Category::all();

        return view('admin',compact('contacts','categories'));
    }
}