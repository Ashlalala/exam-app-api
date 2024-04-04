<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Resources\ExamCollection;
use App\Http\Resources\ExamResource;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $category
     * @param string $subCategory
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category, $subCategory)
    {
        return new ExamCollection(
            Exam::where('category', '=', $category)
                ->where('sub_category', '=', $subCategory)
                ->get()
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
     * @param string $category
     * @param string $subCategory
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request, $category, $subCategory)
    {
        $request->validate([
            'user_id' => 'nullable|max:100', //change
            'name' => 'required|max:100',
            'description' => 'nullable|max:500',
        ]);

        $requestData = $request->all();
        // $requestData userId auth sanctum merge ........

        $requestData['category'] = $category;
        $requestData['sub_category'] = $subCategory;


        return Exam::create($requestData);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return new ExamResource($exam);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
