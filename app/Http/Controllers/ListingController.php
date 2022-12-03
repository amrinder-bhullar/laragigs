<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show all listings
    public function index()
    {
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Show a single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Show Create Form
    public function create()
    {
        return view('listings.create');
    }

    //Store the form
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $attributes['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $attributes['user_id'] = auth()->id();

        // dd($attributes);

        Listing::create($attributes);

        return redirect('/listings/manage')->with('message', 'Listing created successfully');
    }
    //Update the listing
    public function update(Request $request, Listing $listing)
    {
        //Make sure auth id is owner of the listing
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $attributes = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $attributes['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($attributes);

        return redirect('/listings/manage')->with('message', 'Listing updated successfully');
    }

    //Show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    //Delete Single Listing
    public function destroy(Listing $listing)
    {
        //Make sure auth id is owner of the listing
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();

        return redirect('/listings/manage')->with('message', 'Listing deleted successfully');
    }

    //Manage user->listings

    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings]);
    }
}
