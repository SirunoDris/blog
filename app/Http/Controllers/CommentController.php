<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Pio;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('pios.comment',[
        //     'comments'=> Comment::All(),
        // ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pio $pio ) //recoges el mensaje commentario y los datos del post
    {
         //dd($request->message);
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        $comment = new Comment();        
        //crea una instaancia en el model 
        // otra manera $comment = Comment::create("message"=> "vdsjjfidsjg","user_id"=>1,"pio_id"=>1);
        // guardas los datos. Request es objeto de laravel
        $comment->user_id = $request->user()->id;
        $comment->pio_id = $pio->id;
        $comment->message= $request->message;
        $comment->save();
        //return redirect(route('pios.index'))
        return redirect(route('pios.show', $pio->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
