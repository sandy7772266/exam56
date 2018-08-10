<?php

namespace App\Http\Controllers;

use App\exam;
use App\Http\Requests\ExamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if (Auth::check() and Auth::user()->can('建立測驗')) {
        if (Auth::check()) {
            $exams = Exam::orderBy('created_at', 'desc')
                ->paginate(3);
        } else {
            $exams = Exam::where('enable', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        }

        // $exams = Exam::where('enable', 0)
        //     ->orderBy('created_at', 'desc')
        //     ->take(2)
        //     ->get();
        //$exams = Exam::all();
        return view('exam.index', compact('exams')); //;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam.create'); //;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {

        Exam::create($request->all());
        return redirect()->route('exam.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //$exam = Exam::find($id);
        //$topics = Topic::where('exam_id', $exam->id)->get();
        //dd($exam->topics);
        // if (Auth::check()){
        //     if ($exam->topics->count()>5){
        //          $exam->topics = $exam->topics->random(5);
        //     }
        //     return view('exam.show', compact('exam')); //;
        // }
        return view('exam.show', compact('exam')); //;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('exam.create', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        $exam->update($request->all());
        return redirect()->route('exam.show', $exam->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        //return redirect()->route('exam.index', $exam->id);
    }
}
