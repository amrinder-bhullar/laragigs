<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    //Display bookmark view
    public function index()
    {
        return view('users.dashboard.bookmarks', [
            'bookmarks' => auth()->user()->bookmarks
        ]);
    }

    // Save a bookmark
    public function store(User $user, Listing $listing)
    {
        request()->validate([
            'listing_id' => [
                'required'
            ]
        ]);

        if (Bookmark::where('user_id', auth()->id())->where('listing_id', $listing->id)->doesntExist()) {

            Bookmark::create([
                'user_id' => auth()->id(),
                'listing_id' => $listing->id
            ]);

            // dd(auth()->id(), $listing->id);

            return back()->with('message', 'Saved in bookmarks');
        }

        return back()->with('message', 'Bookmark already exists');
    }

    public function destroy(Bookmark $bookmark, Listing $listing)
    {
        // $bookmark = Bookmark::where('user_id', auth()->id())->where('listing_id', $listing->id)->first();

        if ($bookmark->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $bookmark->delete();

        return back()->with('message', 'bookmark removed');
    }
}
