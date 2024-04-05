<?php

namespace App\Http\Controllers;

use App\Models\CompletedExam;
use App\Http\Requests\StoreCompletedExamRequest;
use App\Http\Requests\UpdateCompletedExamRequest;

class CompletedExamController extends Controller
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
     * @param  \App\Http\Requests\StoreCompletedExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompletedExamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompletedExam  $completedExam
     * @return \Illuminate\Http\Response
     */
    public function show(CompletedExam $completedExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompletedExam  $completedExam
     * @return \Illuminate\Http\Response
     */
    public function edit(CompletedExam $completedExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompletedExamRequest  $request
     * @param  \App\Models\CompletedExam  $completedExam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompletedExamRequest $request, CompletedExam $completedExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompletedExam  $completedExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompletedExam $completedExam)
    {
        //
    }
}
