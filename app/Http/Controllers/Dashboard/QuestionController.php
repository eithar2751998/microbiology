<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\QuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\New_;
use PHPUnit\Exception;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $questions = Question::paginate(6);
        $trashedQuestions = Question::onlyTrashed()->latest()->paginate(15);
        return view('dashboard.questions.index',compact('questions','trashedQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $subjects = Subject::where('status',1)->get();
        return view('dashboard.questions.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     * @return RedirectResponse
     */
    public function store(QuestionRequest $request): RedirectResponse
    {

        try {
            $question=new Question();
            $question->title=$request->title;

            if ($request->hasfile('image')) {
                $name = $request->image->getClientOriginalName();
                $request->image->move(public_path() . '/questions/' . $request->title . '/', $name);
                $question->image = $name;
            }
            $question->save();

            $lastQuestion = Question::latest()->first();
            $questionID = $lastQuestion->id;

            foreach ($request->text as $key => $textAnswer){
                $answer = new Answer();
                $answer->text = $textAnswer;
                $answer->question_id = $questionID;

                if ($request->correct == $key){
                    $answer->correct = 1;
                }
                else {
                    $answer->correct = 0;
                }

                $answer->save();
            }
                if ($lastQuestion->subjects()->sync($request->subjects)) {
                    return redirect()->route('dashboard.question.index')
                        ->with(['success'=> __('global.success_save')]);

                }
                else {
                    return redirect()->back()->with(['error'=> __('global.error_save')]);
                }


        } catch (\Exception $e) {
            return redirect()->route('dashboard.question.index')->
            with(['error'=> __('global.data_error')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $question = Question::find($id);
        $answers = $question->answers()->get();
        $subjects = $question->subjects()->get();
        return response()->json([$question,$answers,$subjects]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $question = Question::find($id);
        $subjects = Subject::all();
        return view('dashboard.questions.edit',compact('question','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validate = Validator::make($request->all(), [
            'title'         => 'required|min:5',
            'image'         => 'mimes:jpeg,jpg,png',
            'text'          => 'required',
            'subjects'      => 'required'
        ],[
            'image.mimes'       =>'jpeg or jpg or png'
        ]);
        if ($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }

        try {
            $question = Question::find($id);
            $question->update(['title'=>$request->title]);
            if ($request->hasfile('image')) {
                $name = $request->image->getClientOriginalName();
                $request->image->move(public_path() . '/questions/' . $request->title . '/', $name);
                $question->update(['image' => $name]);
            }
            $question->subjects()->sync($request->subjects);

            $answers = $question->answers()->get();
            $answersCount = $answers->count();
            $newAnswersCount = count($request->text);

            if ($newAnswersCount < $answersCount){
                foreach ($request->text as $key => $newAnswer){

                    if ( $key+1 < $newAnswersCount){
                        $answers[$key]->update(['text' => $newAnswer]);
                        if ($request->correct == $key){
                            $answers[$key]->update(['correct' => 1]);
                        }
                        else {
                            $answers[$key]->update(['correct' => 0]);
                        }
                    }
                    else{
                        $answers[$key]->delete();
                    }
                }
            }
            elseif ($newAnswersCount > $answersCount){
                foreach ($request->text as $key => $newAnswer){

                    if ( $key+1 < $newAnswersCount){
                        $answers[$key]->update(['text' => $newAnswer]);
                        if ($request->correct == $key){
                            $answers[$key]->update(['correct' => 1]);
                        }
                        else {
                            $answers[$key]->update(['correct' => 0]);
                        }
                    }
                    else{
                        $answer = new Answer();
                        $answer->text = $newAnswer;
                        $answer->question_id = $question->id;

                        if ($request->correct == $key){
                            $answer->correct = 1;
                        }
                        else {
                            $answer->correct = 0;
                        }

                        $answer->save();
                    }
                }

            }
            else{
                foreach ($request->text as $key => $newAnswer){
                    $answers[$key]->update(['text' => $newAnswer]);
                    if ($request->correct == $key){
                        $answers[$key]->update(['correct' => 1]);
                    }
                    else {
                        $answers[$key]->update(['correct' => 0]);
                    }
                }
            }

            return redirect()->route('dashboard.question.index')
                ->with(['success'=> __('global.success_update')]);
        }
        catch (Exception $e){
            return redirect()->route('dashboard.question.index')
                ->with(['error'=> __('global.data_error')]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $question = Question::find($id);
        if ($question->delete())
            return redirect()->route('dashboard.question.index')
                ->with(['success' => __('global.success_delete')]);
        else
            return redirect()->route('dashboard.question.index')
                ->with(['error' => __('global.error_delete')]);
    }
    public function forceDelete($id): RedirectResponse
    {
        if (Question::withTrashed()->find($id)->forceDelete())
            return redirect()->route('dashboard.question.index')
                ->with(['success' => __('global.success_force_delete')]);
        else
            return redirect()->route('dashboard.question.index')
                ->with(['error' => __('global.error_force_delete')]);
    }
    public function restore($id): RedirectResponse
    {
        if (Question::withTrashed()->find($id)->restore())
            return redirect()->route('dashboard.question.index')
                ->with(['success' => __('global.success_restore')]);
        else
            return redirect()->route('dashboard.question.index')
                ->with(['error' => __('global.error_restore')]);
    }
}
