<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function showContactForm()
{
    return view('contact.form');
}
public function submitContactForm(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'title' => 'required|string',
            'problem' => 'required|string',
        ]);

        // Save the contact form data to the database
        $contact = Contact::create([
            'username' => $request->input('username'),
            'title' => $request->input('title'),
            'problem' => $request->input('problem'),
            'status' => 'pending', // You can add a 'status' field for pending or resolved
        ]);

        return redirect()->route('contact.show', ['id' => $contact->id])->with('success', 'Your inquiry has been submitted successfully!');
    }

    public function showInquiry($id)
    {
        $inquiry = Contact::findOrFail($id);

        return view('contact.inquiry', compact('inquiry'));
    }

    public function showAdminInquiries()
    {
        $inquiries = Contact::all();

        return view('admin.inquiries', compact('inquiries'));
    }

    public function respondToInquiry(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        $inquiry = Contact::findOrFail($id);
        $inquiry->response = $request->input('response');
        $inquiry->status = 'resolved'; // Change the status to resolved
        $inquiry->save();

        return redirect()->route('admin.inquiries')->with('success', 'Your response has been sent successfully!');
    }

}
