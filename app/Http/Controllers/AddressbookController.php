<?php

namespace App\Http\Controllers;

use App\Addressbook;
use Illuminate\Http\Request;
use App\Http\Requests\AddressbookRequest;

class AddressbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function fetchdata()
    {
        return AddressBook::orderBy("firstname", "ASC")->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressbookRequest $request)
    {
        //return $request->all();

        $ab = new Addressbook;
        $ab->firstname = $request->firstname;
        $ab->lastname = $request->lastname;
        $ab->phone = $request->phone;
        $ab->email = $request->email;
        $ab->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Addressbook  $addressbook
     * @return \Illuminate\Http\Response
     */
    public function show(Addressbook $addressbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Addressbook  $addressbook
     * @return \Illuminate\Http\Response
     */
    public function edit(Addressbook $addressbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Addressbook  $addressbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addressbook $addressbook)
    {
        //return $request->all();

        $ab = Addressbook::find($request->id);
        $ab->firstname = $request->firstname;
        $ab->lastname = $request->lastname;
        $ab->phone = $request->phone;
        $ab->email = $request->email;
        $ab->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Addressbook  $addressbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addressbook $addressbook)
    {
        Addressbook::where("id", $addressbook->id)->delete();
    }
}
