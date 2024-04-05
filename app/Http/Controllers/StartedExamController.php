<?php

namespace App\Http\Controllers;

use App\Models\StartedExam;
use App\Http\Requests\StoreStartedExamRequest;
use App\Http\Requests\UpdateStartedExamRequest;
use App\Models\AnsweredQuestion;

class StartedExamController extends Controller
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
     * @param int $examId
     * @param  \App\Http\Requests\StoreStartedExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStartedExamRequest $request, $examId)
    {
        $request->validate([
            'user_id' => 'nullable|max:100', //change
        ]);

        $requestData = $request->all();
        // $requestData userId auth sanctum merge ........

        $requestData['exam_id'] = $examId;


        return StartedExam::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StartedExam  $startedExam
     * @return \Illuminate\Http\Response
     */
    public function show(StartedExam $startedExam)
    {
        return $startedExam;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StartedExam  $startedExam
     * @return \Illuminate\Http\Response
     */
    public function edit(StartedExam $startedExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateStartedExamRequest  $request
     * @param int $examId
     * @param  int  $startedExam
     * @param string $completed
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStartedExamRequest $request, $examId, $startedExamId, $completed)
    {
        if($completed != 'completed') return;

        $requestData = $request->all();

        $requestData['completed'] = true;



        $allQAs = AnsweredQuestion::where('started_exam_id', '=', $startedExamId)->get();
        $correctQAs = AnsweredQuestion::where('started_exam_id', '=', $startedExamId)->where('correct', '=', true)->get();
        $requestData['score'] = round(count($correctQAs) / count($allQAs), 2);



        $startedExam = StartedExam::find($startedExamId);
        $startedExam->update($requestData);
        return $startedExam;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StartedExam  $startedExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(StartedExam $startedExam)
    {
        //
    }

    // private function getScore($examId){
    //     $allQAs = AnsweredQuestion::where('started_exam_id', '=', $examId);
    //     $correctQAs = $allQAs::where('correct', '=', true);
    //     return count($correctQAs)/100;
    // }
}
