<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Investments;
use App\Models\Project;
use App\Models\Update;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Quick stats
        $totalProjects = Project::count();
        $activeProjects = Project::whereIn('status', [
            Project::STATUS_PENDING_EQUITY,
            Project::STATUS_PENDING_PURCHASE,
            Project::STATUS_PENDING_CONSTRUCTION,
            Project::STATUS_UNDER_CONSTRUCTION,
        ])->count();
        
        $totalAccounts = Account::where('deleted', 0)->count();
        $totalInvestments = Investments::count();
        $totalInvested = Investments::sum('amount');
        $totalPaid = Investments::where('paid', 1)->sum('amount');
        
        // Recent activity
        $recentProjects = Project::orderByDesc('created_on')->limit(5)->get();
        $recentUpdates = Update::where('deleted', 0)->orderByDesc('sent_on')->limit(5)->get();
        $recentInvestments = Investments::with(['project', 'account'])->orderByDesc('id')->limit(10)->get();
        
        // Projects needing attention
        $projectsNeedingAttention = Project::whereIn('status', [
            Project::STATUS_PENDING_REVIEW,
            Project::STATUS_UNDER_REVIEW,
            Project::STATUS_PENDING_COMPLIANCE,
        ])->orderByDesc('updated_on')->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalProjects',
            'activeProjects',
            'totalAccounts',
            'totalInvestments',
            'totalInvested',
            'totalPaid',
            'recentProjects',
            'recentUpdates',
            'recentInvestments',
            'projectsNeedingAttention'
        ));
    }
}

