<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        return view('messages.index', compact('messages'));
    }

    /**
     * Store a newly created resource in storage via API.
     */
    public function apiStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject ?? 'Contact Form Submission',
            'phone' => $request->phone ?? null,
            'message' => $request->message,
            'read' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        // Automatically mark the message as read when viewed
        if (!$message->read) {
            $message->read = true;
            $message->save();
        }

        return view('messages.show', compact('message'));
    }

    /**
     * Mark the message as read.
     */
    public function markAsRead(Message $message)
    {
        $message->read = true;
        $message->save();

        return redirect()->back()
            ->with('success', 'Message marked as read');
    }

    /**
     * Mark the message as unread.
     */
    public function markAsUnread(Message $message)
    {
        $message->read = false;
        $message->save();

        return redirect()->back()
            ->with('success', 'Message marked as unread');
    }

    /**
     * Mark all messages as read.
     */
    public function markAllAsRead()
    {
        Message::where('read', false)->update(['read' => true]);

        return redirect()->route('messages.index')
            ->with('success', 'All messages marked as read');
    }

    /**
     * Delete all messages.
     */
    public function deleteAll()
    {
        Message::truncate();

        return redirect()->route('messages.index')
            ->with('success', 'All messages have been deleted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        if (url()->previous() === route('messages.show', $message->id)) {
            return redirect()->route('messages.index')
                ->with('success', 'Message deleted successfully');
        }

        return redirect()->back()
            ->with('success', 'Message deleted successfully');
    }
}