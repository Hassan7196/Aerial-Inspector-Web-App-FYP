<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\sprayInformation;
use Illuminate\Http\Request;

class sprayInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('SprayInformation.sprayInformation');
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

        $crop = $request->crop;
        $description = $request->description;
        $disease = $request->disease;
        $admin = admin::where('firstname',$request->adminName)->first();

        $sprayInformation = new sprayInformation(['cropName'=>$crop,'diseaseName'=>$disease,'sprayDescription'=>$description]);


        $admin->sprayInformations()->save($sprayInformation);

        return view('SprayInformation.sprayInformation');
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
        //
        if (isset($_POST['editSI'])) {
            return view('SprayInformation.editSprayInformation')->with('id', $id);
        }
        else {


            $SI = sprayInformation::find($id);

            $SI->cropName = $request->crop;
            $SI->diseaseName = $request->disease;
            $SI->sprayDescription = $request->disease;

            $SI->save();

            return view('SprayInformation.sprayInformation');
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


        $sprayInformation = sprayInformation::find($id);
        //
        $sprayInformation->delete();

        return view("SprayInformation.sprayInformation");
    }
}
