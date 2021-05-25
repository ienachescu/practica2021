<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use App\Models\User;
use App\Models\BoardUser;
use App\Models\Task;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();

        $boards = Board::with(['user', 'boardUsers']);
        $users = User::query();

        if ($user->role === User::ROLE_USER) {
            $boards = $boards->where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhereHas('boardUsers', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    });
            });
        }

        $boards = $boards->select('id', 'name')->get();

        $tasksNumber = 0;
        $boardsCompleted = 0;

        foreach ($boards as $board) {
            $tasksNumber += $board->tasks()->where('assignment', $user->id)->count();
            if ($board->tasks()->where('status', Task::STATUS_DONE)->count() === $board->tasks()->count() && $board->tasks()->count() != 0) {
                $boardsCompleted += 1;
            }
        }

        return view(
            'dashboard.index',
            [
                'boards' => $boards,
                'boardsNumber' => $boards->count(),
                'boardsCompleted' => $boardsCompleted,
                'tasksNumber' => $tasksNumber,
                'usersNumber' => $users->count(),
                
            ]);
    }
}
