<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;
use Inertia\Inertia;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $landingPages = LandingPage::all();
        return Inertia::render(
            'Dashboard/LandingPages/Index',
            compact('landingPages')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Dashboard/LandingPages/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        LandingPage::create($request->all());

        return redirect()->route('landing-pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $landingPage = LandingPage::find($id);
        return Inertia::render(
            'Dashboard/LandingPages/Show',
            compact('landingPage')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $landingPage = LandingPage::find($id);
        return Inertia::render(
            'Dashboard/LandingPages/Edit',
            compact('landingPage')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $landingPage = LandingPage::find($id);
        $landingPage->update($request->all());

        return redirect()->route('landing-pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LandingPage::destroy($id);
        return redirect()->route('landing-pages.index');
    }
}
