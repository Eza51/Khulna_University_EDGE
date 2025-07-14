<?php



namespace App\Http\Controllers;

use App\Models\Annoucement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Display all announcements
    public function index()
    {
        $announcements = Annoucement::all();
        return view('admin.annoucement.index', compact('announcements'));
    }

    // Show the form to create a new announcement
    public function create()
    {
        return view('admin.annoucement.create');
    }

    // Store a new announcement
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'type' => 'required|string|in:Teacher,Student',
        ]);

        Annoucement::create([
            'message' => $request->message,
            'type' => $request->type,
        ]);

        return redirect()->route('announcement.index')->with('success', 'Announcement created successfully!');
    }

    // Show the form to edit an existing announcement
    public function edit(Annoucement $announcement)
    {
        return view('admin.annoucement.edit', compact('announcement'));
    }

    // Update an existing announcement
    public function update(Request $request, Annoucement $announcement)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'type' => 'required|string|in:Teacher,Student',
        ]);

        $announcement->update([
            'message' => $request->message,
            'type' => $request->type,
        ]);

        return redirect()->route('announcement.index')->with('success', 'Announcement updated successfully!');
    }

    // Delete an announcement
    public function destroy(Annoucement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcement.index')->with('success', 'Announcement deleted successfully!');
    }
}
