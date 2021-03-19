<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
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

    public function test()
    {
        return response()->json([
            'msg' => 'some error occured'
        ],422)
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormSubmission  $formSubmission
     * @return \Illuminate\Http\Response
     */
    public function show(FormSubmission $formSubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormSubmission  $formSubmission
     * @return \Illuminate\Http\Response
     */
    public function edit(FormSubmission $formSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormSubmission  $formSubmission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormSubmission $formSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormSubmission  $formSubmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormSubmission $formSubmission)
    {
        //
    }
}
