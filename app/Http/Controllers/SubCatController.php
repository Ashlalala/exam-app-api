<?php

namespace App\Http\Controllers;

use App\Models\SubCat;
use App\Http\Requests\StoreSubCatRequest;
use App\Http\Requests\UpdateSubCatRequest;

class SubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $category
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        return SubCat::where('parent_cat', '=', $category)->get();
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
     * @param  \App\Http\Requests\StoreSubCatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCatRequest $request, $category)
    {
        //Check if $category is in cats table name

        $request->validate([
            'user_id' => 'nullable|max:100', //change
            'name' => 'required|max:100',
        ]);

         $requestData = $request->all();
        // $requestData userId auth sanctum merge ........

        $requestData['parent_cat'] = $category;

        return SubCat::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function show(SubCat $subCat)
    {
        return $subCat;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCat $subCat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCatRequest  $request
     * @param  \App\Models\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCatRequest $request, SubCat $subCat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCat $subCat)
    {
        //
    }
}
