<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'major'=>'required',
//            'units'=> 'required|integer',
//            'grad_date' => 'required',
//            'college'=>'required',
//            'bio'=> 'required',
//            'research' => 'required',
//            'fun_fact'=>'required',
//            'academic_interests' => 'required'
//        ]);
        $student = new StudentInfo;

        $student->user_id = "1"; //this needs to be auth()->user()
        $student->major = $request->major;
        $student->units = $request->units;
        $student->grad_date = $request->grad_date;
        $student->college = $request->college;
        $student->bio = $request->bio;
        $student->research = $request->research;
        $student->fun_facts = $request->fun_facts;
        $student->academic_interest = $request->academic_interest;

        $student->save();

        return "Info Saved";
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
