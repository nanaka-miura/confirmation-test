<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $contactData = $request->all();
        return view('index', compact('categories', 'contactData'));
    }

    public function confirm(ContactRequest $request)
    {

        $contact = $request->only('category_id','content','last_name','first_name','gender','email','tel1','tel2','tel3','address','building','detail'
);

        $contact['tel'] = $contact['tel1'] . $contact['tel2'] . $contact['tel3'];

        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category ? $category->content : '不明';

        session(['contact_data' => $contact]);

        return view('confirm',compact('contact'));
    }

    public function store(Request $request)
    {

        $contact = $request->only('category_id','content','last_name','first_name','gender','email','tel','address','building','detail');
        Contact::create($contact);
        return view('thanks');
    }

}
