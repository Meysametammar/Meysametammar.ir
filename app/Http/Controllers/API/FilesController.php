<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name = auth()->user()->id . "_" . time() . "." . $request->file("file")->extension();
        $path = $request->file("file")->storeAs($request->type, $file_name);
        $file = new Files();
        $file->user_id = auth()->user()->id;
        $file->path = $path;
        $file->mime = $request->file("file")->extension();
        $file->type = $request->type;
        if ($file->save()) {
            return ["ok" => true, "id" => $file->id];
        } else {
            return ["ok" => false];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function show(Files $file)
    {
        // $files = Files::find($id);
        // return $files->user;
        return $file;
        // return $id;
        // return response()->file($files->path);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy(Files $files)
    {
        //
    }
}
