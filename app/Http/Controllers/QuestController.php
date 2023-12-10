<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quest;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{
    public function showQuestBoard()
    {
        $quests = Quest::where('status', 'available')->get(); //ALLE available quests
        return view('adventure.quest_board', ['quests' => $quests]);
    }
    public function createQuest(){
        return view('adventure.create_quest');
    }
    public function showMyQuests()
    {
        $activeQuests = Quest::where('status', 'accepted')
            ->where('active_user_id', auth()->user()->id)
            ->get();

        $completedQuests = Quest::where('status', 'finished')
            ->where('active_user_id', auth()->user()->id)
            ->get();

        return view('adventure.my_quests', ['activeQuests' => $activeQuests, 'completedQuests' => $completedQuests]);
    }

    public function makeQuest(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'reward' => 'required|numeric|min:1',
            'duration' => 'required|numeric|min:1',
        ]);

        Quest::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'reward' => $request->input('reward'),
            'duration' => $request->input('duration'),
        ]);
        return redirect()->route('home');
    }
    public function acceptQuest($id){
        $quest = Quest::find($id);

        if ($quest && $quest->status == 'available') {
            $quest->update([
                'status' => 'accepted',
                'active_user_id' => Auth::user()->id,
                'rewarded' => false,
            ]);
        }

        return redirect()->route('quests.show');
    }
    

    public function claimReward($id){
        $quest = Quest::find($id);
        if ($quest && !$quest->rewarded && $quest->isClaimable()) {
            $user = Auth::user();
            $user->balance += $quest->reward;
            $user->save();
            $quest->update([
                'status' => 'finished',
                'rewarded' => true,
            ]);
        }
        return redirect()->route('my_quests.show');
    }

    public function deleteQuest($id){
        $quest = Quest::find($id);
        if ($quest) {
        $quest->delete();
        }
        return redirect()->route('quests.show')->with('success', 'Quest deleted successfully');
    }
}
