<?php

namespace App\Http\Controllers;

use App\contact;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts=contact::all();
        $id=Auth::user()->id;
        $user=User::find($id);
       return view('contact.show',compact('contacts','user'));
    }
    public function create()
    {
        return view('contact.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'family_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|size:11|regex:"^09"',
        ]);
        $contact=new contact;
        $contact->name=$request->input('name');
        $contact->family_name=$request->input('family_name');
        $contact->email=$request->input('email');
        $contact->phone_number=$request->input('phone_number');
        $contact->description=trim($request->input('description'));
        $contact->user_id=Auth::user()->id;
        $contact->save();
       return redirect('/contacts');
    }
    public function showContact($id)
    {
        $contact=contact::find($id);
        $user_id=Auth::user()->id;
        $user=User::find($user_id);
        $contacts=contact::all();
        return view('contact.showContact',compact('contact','contacts','user'));
    }
    public function deleteContact($id)
    {
        $contact=contact::find($id);
        $contact->delete();
        return redirect('/contacts');
    }
    public function editContact($id)
    {
        $contact=contact::find($id);

        return view('contact.edit',compact('contact'));
    }
    public function editStoreContact(Request $request,$id)
    {
        $contact=contact::find($id);
        $this->validate($request,[
        'name' => 'required|max:255',
        'family_name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone_number' => 'required|size:11|regex:"^09"',
    ]);
        $contact->name=$request->input('name');
        $contact->family_name=$request->input('family_name');
        $contact->email=$request->input('email');
        $contact->phone_number=$request->input('phone_number');
        $contact->description=$request->input('description');
        $contact->id=$id;
        $contact->save();
        return redirect('/contacts');

    }
}
