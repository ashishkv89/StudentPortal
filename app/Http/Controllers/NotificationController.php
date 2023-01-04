<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Notifications\NewPostCommentNotification;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class NotificationController extends Controller
{
    public function showNotification()
    {
        $notifications = Auth::user()->unreadNotifications;
        return view('notifications', compact('notifications'));
    }
     
    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();
 
        return redirect()->route('notifications.unread')->with('success', 'All Notifications Cleared');
    }
}
