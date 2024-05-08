<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('newsletters.index', [
            'newsletters' => Newsletter::all()
        ]);
    }

    public function show(Newsletter $newsletter)
    {
        return view('newsletters.show', [
            'newsletter' => $newsletter
        ]);
    }

    public function create()
    {
        return view('newsletters.create', []);
    }

    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'title' => ['required'],
            'description' => ['required', 'email'],
            'content' => ['required'],
            'author' => ['required']
        ]);

        $user = Newsletter::create($form_fields);

        return redirect('/newsletters');
    }
}
