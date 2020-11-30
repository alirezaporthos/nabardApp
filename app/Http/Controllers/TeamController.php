<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Mobile;
use App\Team;

class TeamController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'first_member' => ['required', 'string', 'min:5', 'max:255'],
            'mobile' => ['required', 'numeric', new Mobile, 'digits:11', 'unique:teams,mobile,'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'video' => ['required','file','mimetypes:video/mp4'],
            'pdf' => ['required','file','mimes:pptx'],
            'app' => ['required','file','mimes:zip'],
            'second_member' => ['nullable', 'string', 'min:5', 'max:255'],
            'third_member' => ['nullable', 'string', 'min:5', 'max:255'],
            'fourth_member' => ['nullable', 'string', 'min:5', 'max:255'],
            'fifth_member' => ['nullable', 'string', 'min:5', 'max:255'],

        ]);
        //team members
        $teamMembers = [];
        if($request->second_member)
            $teamMembers[] = ['name' => $request->second_member];

        if($request->third_member)
            $teamMembers[] = ['name' => $request->third_member];

        if($request->fourth_member)
            $teamMembers[] = ['name' => $request->fourth_member];

        if($request->fifth_member)
            $teamMembers[] = ['name' => $request->fifth_member];


        $team = new Team;
        $team->title = $request->title;
        $team->first_member = $request->first_member;
        $team->mobile = $request->mobile;
        $team->email = $request->email;

        //save files

        $teamPdfName = uniqid() . '.' . $request->file('pdf')->getClientOriginalExtension();
        $teamPdfPath = $request->file('pdf')->move( today()->format('Ymd'), $teamPdfName)->getpathname();
        $team->pdf = $teamPdfPath;

        $teamAppName = uniqid() . '.' . $request->file('app')->getClientOriginalExtension();
        $teamAppPath = $request->file('app')->move( today()->format('Ymd'), $teamAppName)->getpathname();
        $team->app = $teamAppPath;

        $teamVideoName = uniqid() . '.' . $request->file('video')->getClientOriginalExtension();
        $teamVideoPath = $request->file('video')->move( today()->format('Ymd'), $teamVideoName)->getpathname();
        $team->app = $teamVideoPath;




        $team->save();



        $team->TeamMembers()->createMany($teamMembers);

        return redirect('/')->with('success','ثبت نام موفقیت آمیز بود');

    }
}
