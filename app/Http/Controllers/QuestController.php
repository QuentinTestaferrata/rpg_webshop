<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function showQuestBoard(){
        return view('adventure.quest_board');
    }

    public function createQuest(){
        return view('adventure.create_quest');
    }
}
