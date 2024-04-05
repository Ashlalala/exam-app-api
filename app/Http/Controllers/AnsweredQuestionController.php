<?php

namespace App\Http\Controllers;

use App\Models\AnsweredQuestion;
use App\Http\Requests\StoreAnsweredQuestionRequest;
use App\Http\Requests\UpdateAnsweredQuestionRequest;
use App\Models\QA;

class AnsweredQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int startedExamId
     *
     * @return \Illuminate\Http\Response
     */
    public function index($startedExamId)
    {
        return AnsweredQuestion::where('started_exam_id', '=', $startedExamId)->get();
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
     * @param int $startedExamId
     *
     * @param  \App\Http\Requests\StoreAnsweredQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnsweredQuestionRequest $request, $examId, $startedExamId)
    {
        $request->validate([
            'qa_id' => 'required|max:100', //change
            'ans' => 'required|max:455',
        ]);

        $requestData = $request->all();

        $requestData['started_exam_id'] = $startedExamId;

        $requestData['correct'] = $this->isCorrect($requestData['ans'], $requestData['qa_id']);

        return AnsweredQuestion::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnsweredQuestion  $answeredQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(AnsweredQuestion $answeredQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnsweredQuestion  $answeredQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(AnsweredQuestion $answeredQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnsweredQuestionRequest  $request
     * @param  \App\Models\AnsweredQuestion  $answeredQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnsweredQuestionRequest $request, AnsweredQuestion $answeredQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnsweredQuestion  $answeredQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnsweredQuestion $answeredQuestion)
    {
        //
    }


    private function isCorrect($ans, $qa_id){

        $rightAns = QA::where('id', '=', $qa_id)->first()->ans_r;

        return $ans == $rightAns;
    }


    //If more decryption will be needed
        // $myKey = '5NmhVXqSro6j9eyNO3bzw';
        // $myIv = '1234567890123456';
        // return $this->decrypt($ans, $myKey, $myIv);
    // }
    // private function decrypt($data, $key, $iv)
    // {
    //     $cryptText = base64_decode($data);
    //     return trim(openssl_decrypt($cryptText, 'aes-256-cbc', $key , OPENSSL_RAW_DATA,$iv));
    // }
}
