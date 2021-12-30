<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = [];

        if ($request->get('candidate_id') !== null) {
            $candidate_id = $request->get('candidate_id');
            return $this->render(Experience::where('candidate_id', '=', $candidate_id)->get());
        }

        return $this->render(Experience::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Experience::create([
            'candidate_id' => $request->candidate_id,
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'description' => $request->description,
            'city' => $request->city,
            'province' => $request->province,
            'country' => $request->country,
            'skills' => $request->skills,
        ]);

        return $this->render($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return $this->render($experience);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        // Should validate inputs here and on FE as well
        $existing = Experience::find($request->id);

        $existing->company_name = $request->company_name;
        $existing->job_title = $request->job_title;
        $existing->description = $request->description;
        $existing->city = $request->city;
        $existing->province = $request->province;
        $existing->country = $request->country;
        $existing->skills = $request->skills;

        $existing->save();
        return $this->render($existing);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $existing = Experience::find($experience->id);
        $results = $existing->delete();
        return $this->render();
    }
}
