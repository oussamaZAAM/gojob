<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(4);

        return view('listing.index', [
            'listings' => $listings
        ]);
    }

    //Show a Listing
    public function show(Listing $listing)
    {
        return view('listing.show', [
            'listing' => $listing
        ]);
    }

    //Show Form to Create a Listing
    public function create()
    {
        return view('listing.create');
    }

    //Store a new Listing
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Job was created successfully');
    }

    //Show Form to Edit a Listing
    public function edit(Listing $listing)
    {
        return view('listing.edit', ['listing' => $listing]);
    }

    //Update a Listing
    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Job Infos was updated successfully');
    }

    //Delete a Listing
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect('/')->with('message', 'Job Infos was deleted successfully');
    }
}
