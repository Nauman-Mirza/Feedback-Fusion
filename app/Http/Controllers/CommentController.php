<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $user = session('user');
        $userId = $user->id;
        $feedback_id = session('feedback_id');
        
        $comment = Comment::create([
            'comment' => $request->comments,
            'user_id' => $userId,
            'feedback_id' => $feedback_id
        ]);

        return redirect()->route('usersMain');
    }

    public function viewComment($id)
    {
        session(['feedback_id' => $id]);
        $comments = Comment::where('feedback_id', $id)
        ->where('status', 'active') 
        ->with('user')
        ->get();

        return view('Comments', compact('comments'));
    }

    public function adminViewComment($id)
    {
        session(['feedback_id' => $id]);
        $comments = Comment::where('feedback_id', $id)
            ->with('user') 
            ->get();

        return view('adminComments', compact('comments'));
    }

    public function disableComment($id)
    {
        $comment = Comment::find($id);

        $comment->status = 'unactive';
        $comment->save();

        return redirect()->route('viewFeedback');
    }

    public function justComment($id)
    {
        $comments = Comment::where('feedback_id', $id)
        ->where('status', 'active') 
        ->with('user')
        ->get();

        return view('justComments', compact('comments'));
    }
}
