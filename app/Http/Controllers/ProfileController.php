<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();
        return view('profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profileCount = Profile::count();

        if ($profileCount > 0) {
            return redirect()->route('profile.index')
                ->with('warning', 'Profile already exists. You can edit the existing profile.');
        }

        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'resume_url' => 'nullable|url',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'website' => 'nullable|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('profile', 'public');
            $data['avatar'] = $avatarPath;
        }

        Profile::create($data);

        return redirect()->route('profile.index')
            ->with('success', 'Profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'resume_url' => 'nullable|url',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'website' => 'nullable|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('avatar')) {
            if ($profile->avatar) {
                Storage::disk('public')->delete($profile->avatar);
            }
            $avatarPath = $request->file('avatar')->store('profile', 'public');
            $data['avatar'] = $avatarPath;
        }

        $profile->update($data);

        return redirect()->route('profile.index')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        if ($profile->avatar) {
            Storage::disk('public')->delete($profile->avatar);
        }

        $profile->delete();

        return redirect()->route('profile.index')
            ->with('success', 'Profile deleted successfully.');
    }

    /**
     * Create a default profile
     */
    public function createDefault()
    {
        // Check if a profile already exists
        if (Profile::count() > 0) {
            return redirect()->route('profile.index')
                ->with('warning', 'A profile already exists. You can edit the existing profile.');
        }

        // Create default profile
        Profile::create([
            'full_name' => 'John Doe',
            'title' => 'Full Stack Developer',
            'bio' => 'Experienced software developer with a passion for creating elegant, efficient, and user-friendly web applications. Proficient in both front-end and back-end technologies.',
            'email' => 'johndoe@example.com',
            'phone' => '+1234567890',
            'location' => 'New York, USA',
            'github' => 'https://github.com/johndoe',
            'linkedin' => 'https://linkedin.com/in/johndoe',
            'website' => 'https://johndoe.dev',
            'twitter' => 'https://twitter.com/johndoe',
            'resume_url' => 'https://drive.google.com/file/d/example-resume',
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Default profile created successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function apiIndex()
    {
        $profile = Profile::first();

        if ($profile && $profile->avatar) {
            $profile->avatar = asset('storage/' . $profile->avatar);
        }

        return response()->json($profile);
    }
}
