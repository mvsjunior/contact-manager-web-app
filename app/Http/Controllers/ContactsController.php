<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            Session::flash('error-message', 'You need to be logged in to access this resource.');
            return redirect()->to('/');
        }

        Session::flash('success-message', 'This feature is still under development :)');
        return redirect()->to('/');
    }

    public function remove(Request $request){

        if(!Auth::check()){
            Session::flash('error-message', 'You need to be logged in to access this resource.');
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
