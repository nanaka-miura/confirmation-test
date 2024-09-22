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

    public function export(Request $request)
    {
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $categoryId = $request->input('category_id');
        $date = $request->input('date');

        $query = Contact::query();

        if ($keyword) {
            $query->where('last_name', 'LIKE', "%{$keyword}%")
                  ->orWhere('first_name', 'LIKE', "%{$keyword}%")
                  ->orWhere('email', 'LIKE', "%{$keyword}%");
        }

        if ($gender) {
            $query->where('gender', $gender);
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        $contacts = $query->get();

        $csvHeader = ['お名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名','お問い合わせの種類', 'お問い合わせ内容'];
        $csvData = [];

        $categories = Category::pluck('content', 'id')->toArray();

        foreach ($contacts as $contact) {
            $csvData[] = [
                "{$contact->last_name} {$contact->first_name}",
                $contact->gender,
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                isset($categories[$contact->category_id]) ? $categories[$contact->category_id] : '不明',
                $contact->detail,
            ];
        }

        $filename = 'contacts_' . date('YmdHis') . '.csv';
        $handle = fopen('php://output', 'w');
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename={$filename}");
        fputcsv($handle, $csvHeader);
        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
        exit;
    }
}