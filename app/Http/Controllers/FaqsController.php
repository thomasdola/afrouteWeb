<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, Faq $faq)
    {
        $this -> validate($request,
	        [
		        'question'=>'required',
		        'answer'=>'required',
	        ]);

	    $faq -> create($request->all());
	    return redirect()->route('settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Faq $faq
	 * @param Request $request
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function update($id, Request $request)
    {
	    $faq = Faq::findOrFail($id);
//        $faq->update($request->all());
	    return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
