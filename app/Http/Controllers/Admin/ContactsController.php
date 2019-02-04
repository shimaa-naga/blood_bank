<?php
/**
 * Created by PhpStorm.
 * User: misr computer
 * Date: 31/01/2019
 * Time: 01:12 ã
 */

namespace App\Http\Controllers\Admin;


use App\Contact;

class ContactsController
{

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function contact_details($id)
    {
        $contact_details = Contact::find($id);
        return view('admin.contacts.contact_details', compact('contact_details'));
    }

    public function delete($id)
    {
        $contact = Contact::find($id)->delete();
            return redirect('/adminpanel/contacts')->withFlashMessage('Message Deleted Successfully');
    }

}