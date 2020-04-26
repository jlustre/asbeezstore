<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;

class QuestionsController extends Controller
{
    public function __construct() {
        //This will prevent to access the pages except index and show
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);
        $pagetitle = 'All Questions';
        return view('questions.index', compact('questions','pagetitle'));
    }

/**
* the following is used for debugging
**/
    // public function index()
    // {
    //     \DB::enableQueryLog();
    //     $questions = Question::with('user')->latest()->paginate(5);
    //     view('questions.index', compact('questions'))->render();
    //     dd(\DB::getQueryLog());
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question(); //This uses policy to grant access
        $pagetitle = 'Create Question';
        return view('questions.create', compact('question','pagetitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title','body'));
        return redirect()->route('questions.index')->with('successMsg', "Your question has been submitted!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        // echo ' I am here at line '.__LINE__.'<pre>';
        // print_r($question);
        $question->increment('views');
        $pagetitle = 'Show Question';
        return view('questions.show', compact('question','pagetitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $this->authorize('update', $question); //See QuestionPolicy update method
        $pagetitle = 'Edit Question';
        return view('questions.edit', compact('question','pagetitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        $question->update($request->only('title','body'));
        return redirect()->route('questions.index')->with('successMsg', "Your question has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this->authorize('delete', $question); //See QuestionPolicy delete method
        $question->delete();
        return redirect()->route('questions.index')->with('successMsg', "Your question has been deleted!");
    }
}
