<?php

namespace App\Http\Livewire;

use App\Models\PricingPlan;
use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Illuminate\Http\Request;


class QuestionPage extends Component
{
    public $questions , $key = 0, $question_count = 0,$correct_answer;

    protected $rules = [
        'questions.*.selected_answer' => 'required',
    ];

    public function mount(Request $request){
            if(Route::current()->uri() == "free-trial"){
            $this->questions = Question::where('free',1)->inRandomOrder()->limit(10)->get();
        }
        else{

            if(auth()->user()){
                $user = User::find(Auth::user()->id);
                $plan = $user->plans->last();
                if(!empty($plan)){
                    if (Route::current()->uri() == "questions/subjects") {
                        $id = $request->segment(3);
                        $topic = Subject::find($id);
                        $this->questions = $topic->questions()->inRandomOrder()->limit($plan->number_of_questions)->get();
                    }
                    else
                        $this->questions = Question::inRandomOrder()->limit($plan->number_of_questions)->get();
                }
                else{
                    $this->questions = Question::where('free',1)->inRandomOrder()->limit(10)->get();
                }
            }
            else{
                $this->questions = Question::where('free',1)->inRandomOrder()->limit(10)->get();
            }
            $this->question_count  = $this->questions->count();
        }

    }
    public function render()
    {
        return view('livewire.question-page');
    }
    public function next()
    {
        if ($this->key < $this->question_count - 1 ) {
            $this->key++;
        }
        else {
            $this->emit('showModal');
        }
    }
    public function correct_answer($key){
        $answers = $this->questions[$key]->answers;
        foreach ($answers as $answer){
            if($answer->correct){
                $this->correct_answer = $answer->id;
            }
        }
    }
}
