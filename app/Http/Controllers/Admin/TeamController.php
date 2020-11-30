<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;
use App\Rules\Mobile;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index(Request $request){


        $request->validate([

            'first_member' => ['nullable', 'exists:teams,first_member'],
            'title' => ['nullable' , 'exists:teams,title']

        ]);

        //get all teams
        $teams = Team::query();

        //filter by title
        if($request->title)
            $teams->where('title',$request->title);

         //filter by first_member
         if($request->first_member)
         $teams->where('first_member',$request->first_member);

         $teams = $teams->orderByDesc('id')->paginate(20);




        return view('dashboard.teams.index',compact('teams'));

    }



    public function download( Request $request){
        $filePath = $request->filePath;
        // dd($filePath);
        $fileType = mime_content_type($filePath);
        $filesize = filesize($filePath);

                header("Content-type:".$fileType);
                header("Content-Length: " .$filesize );
                readfile($filePath);

        //return Storage::download($filePath,'app');

    }

    public function edit($id){
        $team = Team::find($id);
        return view('dashboard.teams.edit',compact('team'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'first_member' => ['required', 'string', 'min:5', 'max:255'],
            'mobile' => ['required', 'numeric', new Mobile, 'digits:11'],
            'email' => ['required', 'string', 'email', 'max:255'],


        ]);


        $team = Team::find($id);
        $team->title = $request->title;
        $team->first_member = $request->first_member;
        $team->mobile = $request->mobile;
        $team->email = $request->email;


        $team->save();
        return redirect()->back()->with('success','ویرایش موفقیت آمیز بود');





    }


    public function destroy($id){
        $team = Team::find($id);
        $team->delete();
        return redirect("/teams")->with('success','حذف شد.');
    }
}
