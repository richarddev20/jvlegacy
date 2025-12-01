<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminInvestorMiddleware
{
    /**
     * Allow only admin / staff investor accounts into /admin.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('investor')->user();

        // Not logged in as investor – let the auth:investor middleware deal with it.
        if (!$user) {
            return redirect()->route('investor.login');
        }

        // Only allow specific account types into admin.
        // 1, 2, 3 are staff / admin; 8 is a normal investor (from existing logic).
        if (!in_array((int) $user->type_id, [1, 2, 3], true)) {
            // Normal investors should never see admin – send them to their dashboard.
            return redirect()->route('investor.dashboard')
                ->with('error', 'You do not have access to the admin area.');
        }

        return $next($request);
    }
}


