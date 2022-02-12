<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Alert;
use Illuminate\Http\Request;

class alertsController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       $heading = $request->heading;
       $description = $request->description;
       $date = $request->date;
       $admin = admin::where('firstname',$request->adminName)->first();

       $alert = new Alert(['heading'=>$heading,'description'=>$description,'date_at_posted'=>$date]);


      $admin->alerts()->save($alert);

      return view('Alerts.alerts');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //

        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
       if(isset($_GET['editPage'])){
           return view('Alerts.editAlert')->with('id',$id);
       }
       else{
         $alert = Alert::whereId($id)->first();

         $alert->heading = $_GET['heading'];
         $alert->date_at_posted = $_GET['date'];
         $alert->description   = $_GET['description'];


         $alert->save();

         return view('Alerts.alerts');
       }

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
        echo "update ";
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $alert = Alert::find($id);
        //
          $alert->delete();

          return view("Alerts.alerts");
    }
}
