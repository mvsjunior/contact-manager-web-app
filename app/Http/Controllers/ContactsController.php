<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paginator = Contact::select('id','name')->paginate(2);

        $contacts = $paginator->items();

        $viewData = [
            'paginator' => $paginator,
            'contacts' => $contacts
        ];

        return view('contacts.index', $viewData);
    }

    public function details(Request $request){

        if(!Auth::check()){
            Session::flash('error-message', "You need to be <a class='alert-link' href=".route('login')." >logged in</a> to access this resource.");
            return redirect()->to(route('contacts.index'));
        }

        $contact = Contact::find($request->id);

        if(empty($contact)){
            Session::flash('error-message', "Record not found.");
            return redirect()->to(route('contacts.index'));
        }

        $viewData = [
            "contact" => $contact,
            "pageTitle" => 'Details'
        ];

        return view('contacts.details', $viewData);
    }

    public function formEdit(Request $request){

        if(!Auth::check()){
            Session::flash('error-message', "You need to be <a class='alert-link' href=".route('login')." >logged in</a> to access this resource.");
            return redirect()->to(route('contacts.index'));
        }

        $contact = Contact::find($request->id);

        if(empty($contact)){
            Session::flash('error-message', "Record not found.");
            return redirect()->to(route('contacts.index'));
        }

        $viewData = [
            "contact" => $contact,
            "pageTitle" => 'Edit'
        ];

        return view('contacts.edit', $viewData);
    }

    public function update(Request $request){
        
        if(!Auth::check()){
            Session::flash('error-message', "You need to be <a class='alert-link' href=".route('login')." >logged in</a> to access this resource.");
            return redirect()->to(route('contacts.index'));
        }

        $validatorIdAndName = Validator::make($request->only(['id','name']),[
            'id' => 'required|integer|min:1',
            'name' => 'min:6'
        ]);

        if($validatorIdAndName->fails()){
            return back()->withErrors($validatorIdAndName)->withInput();
        }

        if(!empty($request->post('email') && $request->post('email') != '')){
            $validatorEmail = Validator::make($request->only(['email']),['email' => 'email|unique:contacts,email,'.$request->post('id')]);
            if($validatorEmail->fails()){
                return back()->withErrors($validatorEmail)->withInput();
            }
        }

        if(!empty($request->post('contact') && $request->post('contact') != '')){
            $validatorContact = Validator::make($request->only(['contact']),['contact' => 'integer|unique:contacts,contact,'.$request->post('id').'|digits:9']);

            if($validatorContact->fails()){
                return back()->withErrors($validatorContact)->withInput();
            }
        }

        $contact = Contact::find($request->id);

    
        if(empty($contact)){
            Session::flash('error-message', "Record not found.");
            return redirect()->to(route('contacts.index'));
        }

        if($contact->update($request->only(['id','name','contact','email']))){
            Session::flash('success-message', "Data updated successfully.");
            return redirect()->to(route('contact.details',['id' => $request->post('id')]));
        }

        $viewData = [
            "contact" => $contact,
            "pageTitle" => 'Edit'
        ];

        return view('contacts.edit', $viewData);
    }


    public function remove(Request $request){

        if(!Auth::check()){
            Session::flash('error-message', "You need to be <a class='alert-link' href=".route('login')." >logged in</a> to access this resource.");
            return redirect()->to('/');
        }

        Session::flash('success-message', 'This feature is still under development :)');
        return redirect()->to('/');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
