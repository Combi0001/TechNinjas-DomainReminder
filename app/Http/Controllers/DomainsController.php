<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain;
use App\User;
use App\Models\UserDomain;

class DomainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = auth()->user('id');
        $domArray = array();

        //get domain ids with matching userid from the userdomain table
        foreach (UserDomain::where('user_id', $user_id->id)->get() as $ud){
            //find the domain with matching domain id
            $domArray[] = Domain::find($ud->domain_id);

        }

        //return the array of domains with matching user id to display for the user
        return view('domains.index')->with('domains', $domArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            //active_url:The field under validation must have a valid A or AAAA record according to the dns_get_record PHP function.
            'domain' => 'required|active_url'
    ]);
        //prevent from adding duplicate domains to the database, instead get the id of it if it exists in the database
        //and use that id to make a new row in the user_domain table with new user_id
        //could theoretically add duplicates to user_domain table //TODO <- prevent that? domains get checked, so the info will be the same regardless of no. entries in user list
        $domain = new Domain();

        //$found = Domain::find($request->domain);
        $found = false;

        foreach (Domain::all() as $domindb) {
            if ($domindb->domain == $request->domain) {
                $domain = $domindb;
                $found = true;
            }
        }

        //if not found in the database, make a new one with the data provided
        if ($found==false) {
            $domain = new Domain();
            $domain->domain = $request->input('domain');
            $domain->last_checked = now();//TODO this will need to be changed, to probs be, never?
            $domain->save();
        }

        //make an entry in the user_domains table with matching user_id and domain_id
        $user_domain = new UserDomain();
        $user_domain->timestamps= false;
        $user_domain->user_id = auth()->user()->id;
        $user_domain->domain_id = $domain->id;


        $user_domain->save();
        return redirect('/domains')->with('success', 'Domain added to your list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domain = Domain::find($id);
        return view('domains.show')->with('domain', $domain);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
