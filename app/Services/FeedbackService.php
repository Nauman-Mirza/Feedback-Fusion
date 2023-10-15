<?php

namespace App\Services;

use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class FeedbackService
{
    public function add(array $data)
    {
        $user = session('user');
        $userId = $user->id;
        $feedback = Feedback::create([
			'title' => $data['title'],
			'description' => $data['description'],
			'category' => $data['category'],
            'user_id' => $userId,
		]);
		return $feedback;
    }

    public function show()
    {
        $feedback = Feedback::with('user')->get();
        return $feedback;
    }

    public function vote($id)
    {
        $feedback = Feedback::find($id);
        if ($feedback) {
            $feedback->increment('vote_count');
            $feedback->save();
        }
        return 'done';
    }
}