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

        $allDomains = Domain::all();
        $user_id = auth()->user('id');
        $user = User::find("$user_id");
        $users_domains = UserDomain::findMany($user_id);
        $domArray = array();

        foreach(UserDomain::all() as $ud)
            if($ud->user_id == $user_id->id )
                foreach(Domain::all() as $dom)
                    if($dom->id == $ud->domain_id)
                        $domArray[] = $dom;

//        foreach ($allDomains as $dom)
//            foreach ($users_domains as $ud)
//                if($ud->id == $dom->id)
//                    $domArray[] = $dom;


        return view('domains.index')->with('domains', $domArray);
        //return view('domains.index')->with('domains', $user->domains);
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
            'domain' => 'required'
    ]);
        $domain = new Domain();
        $domain->domain = $request->input('domain');
        $domain->last_checked = now();//this will need to be changed, to probs be, never
        $domain->save();
        //$user_domain = new User_Domain

        $user_domain = new UserDomain();
        $user_domain->timestamps= false;
        $user_domain->user_id = auth()->user()->id;
        $user_domain->domain_id = $domain->id;
        $user_domain->save();

        return redirect('/domains');
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
