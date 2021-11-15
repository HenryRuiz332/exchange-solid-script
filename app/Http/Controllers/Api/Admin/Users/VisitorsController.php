<?php

namespace App\Http\Controllers\Api\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Visitors;

class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visitors = null;
        if ($request->isMethod("GET")) {
            $visitors =  Visitors::paginate(10);
            $countVisitors = count(Visitors::get(['id']));
            return response()->json([
                'status' => 200,
                'message' => 'Data Succesfull',
                'visitors' => $visitors,
                'countVisitors' => $countVisitors,
                
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Get Request Error'
            ]);  
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function trashAll(Request $request)
    {
        
        if ($request->isMethod("post")) {

            foreach ($request->deletes as $visitor) {
                
                $visitor = Visitors::findOrFail($visitor['id'])->forceDelete();
            }

            return response()->json([
                'status'=> 200,
                'title' => 'Item Destroyed :o',
                'message' => 'Item Destroyed to data base',
            ], 200);
        }
    }
}
