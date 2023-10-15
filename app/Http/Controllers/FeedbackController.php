<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddFeedbackRequest;
use App\Services\FeedbackService;

class FeedbackController extends Controller
{
    public function addFeedback(FeedbackService $feedbackService, AddFeedbackRequest $request)
    {
        $validate = $request->validated();
        $feedback = $feedbackService->add($validate);

        if(!$feedback)
        {
            return 'something went wrong';
        }

        return view('feedbackDone');
    }

    public function showFeedback(FeedbackService $feedbackService)
    {
        $feedbacks = $feedbackService->show();
        return view('allFeedback', compact('feedbacks'));
    }

    public function showUsersFeedback(FeedbackService $feedbackService)
    {
        $feedbacks = $feedbackService->show();
        return view('welcome', compact('feedbacks'));
    }

    public function UsersFeedback(FeedbackService $feedbackService)
    {
        $feedbacks = $feedbackService->show();
        return view('userDashboard', compact('feedbacks'));
    }

    public function voteFeedback($id, FeedbackService $feedbackService)
    {
        $feedbacks = $feedbackService->vote($id);
        return redirect()->route('usersMain');
    }
}
