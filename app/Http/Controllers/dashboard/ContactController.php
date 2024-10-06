<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Emd\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
            'message' => 'required|string',
        ]);
        Contact::create($validate);
        try {
            Mail::to($validate['email'])->send(new ContactMail($validate));
        } catch (\Exception $e) {
            Log::error('Mailer error:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Mail could not be sent.');
        }
        return redirect()->back()->with('success', 'Contact submitted successfully.');
    }

    public function show(Contact $contact)
    {
        //
    }

    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully.');
    }

    public function TrashUser()
    {
        $contacts = Contact::onlyTrashed()->get();
        return view('admin.contact.trash', compact('contacts'));
    }

    public function RestoreUser($id)
    {
        $user = Contact::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('Emd.contact.user.trash')->with('success', 'Contact restored successfully.');
    }
}
