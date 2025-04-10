<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $skillCount = Skill::count();
        $profileCount = Profile::count();
        $messageCount = Message::count();
        $unreadMessageCount = Message::where('read', false)->count();

        return view('dashboard.index', compact(
            'projectCount', 
            'skillCount', 
            'profileCount', 
            'messageCount', 
            'unreadMessageCount'
        ));
    }
}
