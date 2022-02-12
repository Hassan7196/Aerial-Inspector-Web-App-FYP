<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\cultivationGuideline;
use Illuminate\Http\Request;

class cultivationGuidelinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('CultivationGuidelines.cultivationGuidelines');
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
        //

        $heading = $request->heading;
        $description = $request->description;

        $admin = admin::where('firstname',$request->adminName)->first();

        $cultivationGuideline = new cultivationGuideline(
            ['heading'=>$heading,'description'=>$description]
        );


        $admin->cultivationGuidelines()->save($cultivationGuideline);

        return view('cultivationGuidelines.cultivationGuidelines');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          if (isset($_POST['editCG'])){
              return view('CultivationGuidelines.EditcultivationGuidelines')->with('id',$id);
          }
          else{
              $CG = cultivationGuideline::whereId($id)->first();

              $CG->heading = $request->heading;
              $CG->description   = $request->description;



              $CG->save();

              return view('CultivationGuidelines.cultivationGuidelines');
          }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CG = cultivationGuideline::find($id);
        //
          $CG->delete();

        return view('cultivationGuidelines.cultivationGuidelines');
    }
}
