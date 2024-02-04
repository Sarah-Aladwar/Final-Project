<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Contact;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ms = Contact::get();
        return view('admin.messages', compact('ms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ms = Contact::findOrFail($id);
        $ms->update(['read' => true]);
        return view('admin.showmessage', compact('ms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Contact::where('id', $id)->delete();
        return redirect()->route('messages');
    }

    public function trashed()
    {
        $ms = Contact::onlyTrashed()->get();
        return view('admin.trashedmessage', compact('ms'));
    }

    public function restore(string $id): RedirectResponse
    {
        Contact::where('id', $id)->restore();
        return redirect()->route('messages');
    }

    public function fd(string $id): RedirectResponse
    {
        Contact::where('id', $id)->forceDelete();
        return redirect()->route('trashedmessage');;
    }
}
