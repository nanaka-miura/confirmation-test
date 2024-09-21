<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {

        $contact = $request->only('category_id','content','last_name','first_name','gender','email','tel1','tel2','tel3','address','building','detail'
);

        $contact['tel'] = $contact['tel1'] . $contact['tel2'] . $contact['tel3'];
        unset($contact['tel1'], $contact['tel2'], $contact['tel3']);

        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category ? $category->content : '不明';

        return view('confirm',compact('contact'));
    }

    public function store(ContactRequest $request)
    {

        $contact = $request->only('category_id','content','last_name','first_name','gender','email','tel','address','building','detail');
        Contact::create($contact);
        return view('thanks');
    }
}
