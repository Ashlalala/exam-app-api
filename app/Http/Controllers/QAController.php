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
     * @param int $examId
     * @return \Illuminate\Http\Response
     */
    public function index($examId)
    {
        return new QACollection(
            QA::where('exam_id', '=', $examId)->
                where('type', '=', 'full')->latest()->get()
        );
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
     * @param int $examId
     *
     * @param  \App\Http\Requests\StoreQARequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQARequest $request, $examId)
    {
        $request->validate([
            'exam_id' => 'nullable', //change this to required
            'question' => 'required|max:465',
            'ans_r' => 'required|max:455',
            'type' => 'nullable',
            'ans_1' => 'nullable|max:455', // if(type=='full') required
            'ans_2' => 'nullable|max:455',
            'ans_3' => 'nullable|max:455',
            'ans_4' => 'nullable|max:455',
            'ans_5' => 'nullable|max:455',
        ]);

        $requestData = $request->all();

        //add exam_id from the html link prop

        return QA::create($requestData);
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
     * @param int $examId
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQARequest $request, $examId, QA $qA)
    {
        $qA->update($request->all());
        return $qA;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $examId
     * @param  \App\Models\QA  $qA
     * @return \Illuminate\Http\Response
     */
    public function destroy($examId, QA $qA)
    {
        return $qA->delete();
    }
}
