<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    
    public function showContactForm()
    {
        $inquiries = Contact::where('username', auth()->user()->name)->get();

        return view('contact.form', compact('inquiries'));
    }
    public function deleteInquiry($id)
    {   
        $inquiry = Contact::findOrFail($id);
        $inquiry->delete();
        return redirect()->route('admin.inquiries')->with('success', 'Inquiry deleted successfully!');
    }
    public function deleteUserInquiry($id)
    {   
        $inquiry = Contact::findOrFail($id);
        $inquiry->delete();
        return redirect()->route('contact.form')->with('success', 'Inquiry deleted successfully!');
    }
    public function submitContactForm(Request $request)
    {        
        $request->validate([
            'username' => 'required|string',
            'title' => 'required|string',
            'problem' => 'required|string',
        ]);

        $contact = Contact::create([
            'username' => $request->input('username'),
            'title' => $request->input('title'),
            'problem' => $request->input('problem'),
            'status' => 'pending', 
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

        return view('contact.inquiries', compact('inquiries'));
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
