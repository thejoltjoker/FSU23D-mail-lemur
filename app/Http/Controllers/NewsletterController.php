<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function user(Request $request)
    {
        // dd(Auth::id());

        return view('dashboard.newsletters.user', [
            'newsletters' => Newsletter::where('user_id', Auth::id())->get(),
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.newsletters.index', [
            'newsletters' => Newsletter::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.newsletters.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'content' => ['required'],
            'user_id' => ['required'],
        ]);

        $newsletter = Newsletter::create($form_fields);

        return redirect(route('dashboard.newsletters.show', $newsletter))->with([
            'variant' => 'success',
            'title' => 'Newsletter created',
            'message' => 'Your newsletter was created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        return view('dashboard.newsletters.show', [
            'newsletter' => $newsletter,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
