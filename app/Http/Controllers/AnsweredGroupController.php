<?php

namespace App\Http\Controllers;

use App\Models\AnsweredGroup;
use App\Http\Requests\StoreAnsweredGroupRequest;
use App\Http\Requests\UpdateAnsweredGroupRequest;
use App\Http\Resources\GroupCollection;
use App\Models\AnsweredQuestion;
use App\Models\QA;
use App\Models\QAGroup;
use PHPUnit\TextUI\XmlConfiguration\Group;

class AnsweredGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  str  $startedExamId
     * @return \Illuminate\Http\Response
     */
    public function index($startedExamId)
    {

        $allMatchingGroups = AnsweredGroup::where('started_exam_id', '=', $startedExamId)->get();

        $output = [];

        foreach($allMatchingGroups as $group){

            $allMatchingAnsweredQAs = AnsweredQuestion::where('type', '=', 'part')->where('answered_group_id', '=', $group->id)->get();
            $allMatchingQAs = [];
            foreach($allMatchingAnsweredQAs as $answeredQA){

                $matchingQA = QA::where('type', '=', 'part')->where('id', '=', $answeredQA->qa_id)->first();
                $answeredQA->ans_r = $matchingQA->ans_r;
                $answeredQA->question = $matchingQA->question;
            }


            $group->qas=$allMatchingAnsweredQAs;

            array_push($output, $group);
        }



        return new GroupCollection($output);
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
     * @param  \App\Http\Requests\StoreAnsweredGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnsweredGroupRequest $request, $examId, $startedExamId)
    {
        // $request->validate([
        // ]);


        $requestData = $request->all();

        $requestData['started_exam_id'] = $startedExamId;

        // $requestData['scale'] = $this->getScale();

        return AnsweredGroup::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnsweredGroup  $answeredGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AnsweredGroup $answeredGroup)
    {

        $allMatchingQAs = AnsweredQuestion::where('type', '=', 'part')->where('answered_group_id', '=', $answeredGroup->id)->get();

        $answeredGroup->qas=$allMatchingQAs;

        return $answeredGroup;   //add this logic to the resource instead
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnsweredGroup  $answeredGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AnsweredGroup $answeredGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnsweredGroupRequest  $request
     * @param int $examId
     * @param  int  $startedExamId
     * @param  int  $groupId
     *
     * @param string $v
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnsweredGroupRequest $request, $examId, $startedExamId, $groupId, $answered)
    {
        if($answered != 'answered') return;

        $answeredGroup = AnsweredGroup::find($groupId);

        $requestData = $request->all();

        $allPartQAs = AnsweredQuestion::where('type', '=', 'part');

        $allMatchingQAs = $allPartQAs->where('answered_group_id', '=', $answeredGroup->id)->get();
        $correctQAs = $allPartQAs->where('answered_group_id', '=', $answeredGroup->id)->where('correct', '=', true)->get();
        if(count($allMatchingQAs)) $requestData['score'] = round(count($correctQAs) / count($allMatchingQAs), 2);


        $answeredGroup->update($requestData);
        return $answeredGroup;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnsweredGroup  $answeredGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnsweredGroup $answeredGroup)
    {
        //
    }


    private function isCorrect($ans, $qa_id){

        $rightAns = QA::where('id', '=', $qa_id)->first()->ans_r;

        return $ans == $rightAns;
    }
}
