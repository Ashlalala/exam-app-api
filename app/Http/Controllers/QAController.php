<?php

namespace App\Http\Controllers;

use App\Models\QA;
use App\Http\Requests\StoreQARequest;
use App\Http\Requests\UpdateQARequest;
use App\Http\Resources\QACollection;
use App\Http\Resources\QAResource;

class QAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new QACollection(QA::all());
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
     * @param  \App\Http\Requests\StoreQARequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQARequest $request)
    {
        $request->validate([
            'exam_id' => 'nullable', //change this to required
            'question' => 'required|max:465',
            'ans_r' => 'required|max:455',
            'ans_w_1' => 'nullable|max:455',
            'ans_w_2' => 'nullable|max:455',
            'ans_w_3' => 'nullable|max:455',
            'ans_w_4' => 'nullable|max:455',
        ]);

        return QA::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function show(QA $qA)
    {
        return new QAResource($qA);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function edit(QA $qA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQARequest  $request
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQARequest $request, QA $qA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function destroy(QA $qA)
    {
        //
    }
}
