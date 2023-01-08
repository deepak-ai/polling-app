<?php

namespace App\Http\Controllers;
use App\Models\Constituency;
use App\Models\Poll;
use App\Models\PollAnswer;
use App\Models\PollOption;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class PollController extends Controller
{
    protected $poll_id =1;  //we have only single poll in your system

    //index function loads the welocome template. this is where user lands
    public function index(Request $request){
        if(isset($request->poll_id)){
            $this->poll_id = $request->poll_id;
        }
        $constituencies = Constituency::all();
        $pollOptions = PollOption::where(['poll_id'=>$this->poll_id])->get();
        $poll = Poll::find(1);
        return view('welcome', ['constituencies' => $constituencies, 'poll_options'=>$pollOptions, 'poll'=>$poll]);
    }
    
    //Poll Submission
    public function submitPoll(Request $request){
        $pollAnswerModel = PollAnswer::where(['poll_id'=> $request->post('poll_id'), 'constituency_id'=>$request->post('constituency_id'), 'poll_option_id'=> $request->post('poll_option_id') ])->first();
        $validated = $request->validate([
            'poll_id' => 'required|integer',
            'constituency_id' => 'required',
            'poll_option_id' => 'required|integer',
        ], [
            'constituency_id.required' => 'Please select your constituency!',
        ]);
        if(is_null($pollAnswerModel)){
            $pollAnswerModel = new PollAnswer();
            $pollAnswerModel->poll_id = $request->post('poll_id');
            $pollAnswerModel->constituency_id = $request->post('constituency_id');
            $pollAnswerModel->poll_option_id = $request->post('poll_option_id');
            $pollAnswerModel->votes = 1;

            if($pollAnswerModel->save()){
                return redirect()->back()->with('success', 'Your vote has been registered successufully. Checkout Result <a href="/poll-result">here</a> ');   
            }else{
                return redirect()->back()->with('error', 'There is some problem in registering your vote');   
            }
        }else{
            $pollAnswerModel->votes = $pollAnswerModel->votes + 1;
            if($pollAnswerModel->save()){
                return redirect()->back()->with('success', 'Your vote has been registered successufully. Checkout Result <a href="/poll-result">here</a>');
            }else{
                return redirect()->back()->with('error', 'There is some problem in registering your vote');
            }

        }
        
        return 'deepak';
    }
   
    //This function is responsible for showing results to users
    public function result(){
        $pollAnswerModel = PollAnswer::where(['poll_id'=>$this->poll_id])->get();
        $pollOptions = PollOption::where(['poll_id'=>$this->poll_id])->get()->toArray();
        $constituencies = Constituency::all()->toArray();
        $formattedResults = $this->formatResults($pollAnswerModel);
        return view('result' , ['results' => $formattedResults, 'poll_options'=>$pollOptions, 'constituencies'=>array_column($constituencies, 'name')]);
    }
   
    //formatting of results so as to get the results in a tabular manner where constituencies are on x-axis and poll-options or parties are in y-axis
    public function formatResults($pollAnswerModel){
        $poll_options = PollOption::where(['poll_id'=>$this->poll_id])->get()->toArray();
        $constituencies = Constituency::all()->toArray();
        $poll_answer_options = array_column($pollAnswerModel->toArray(), 'poll_option_id');
        $formattedResult = array();
        $i=0;
        foreach($constituencies as $constituency){ 
            foreach($poll_options as $poll_option){
                $votes = 0;    
                if(!in_array($poll_option['id'], array_column($formattedResult, 'poll_option'))){
                    if(in_array($poll_option['id'], $poll_answer_options)){
                        $id = $poll_option['id'];
                        $poll_answers = PollAnswer::where(['constituency_id'=> $constituency['id'],'poll_option_id' => $id])->first();
                        if(!is_null($poll_answers)){
                            $votes = $poll_answers->votes;
                        }
                        
                    }
                    $formattedResult[$i][] = ['constituency_id' => $constituency['id'], 'poll_option' => $poll_option['id'], 'votes' => !empty($votes)?$votes:0] ;   
                }      
               
            }
            $i++;
        }
        
       return $formattedResult;
    }
}
