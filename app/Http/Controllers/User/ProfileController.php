<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SkillUser;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserLanaguage;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileHome()
    {
        $user = Auth::user()->id;
        $skills = Skill::all();
        $services = Service::with('pricing', 'descriptions', 'requirements', 'galleries')
            ->where('user_id', $user)->where('status', 1)->get();
		$draft = Service::with('pricing', 'descriptions', 'requirements', 'galleries')
            ->where('user_id', $user)->where('status', 0)->get();
		$puased = Service::with('pricing', 'descriptions', 'requirements', 'galleries')
            ->where('user_id', $user)->where('status', 2)->get();
        return view('profile_home', compact('services', 'skills','puased','draft'));
    }

    public function updateUserBioDescription(Request $request, $user)
    {
        if($request->input('bio')){
            User::findOrFail($user)->update([
                'bio' => $request->input('bio')
            ]);
        }
        if($request->input('description')){
            User::findOrFail($user)->update([
                'description' => $request->input('description')
            ]);
        }

        return back();
    }

    public function userAvatarUpdate()
    {
        return $request->all();
    }

    public function earnings()
    {
        return view('earnings');
    }

    public function profileSettings()
    {
        return view('profile_settings');
    }

    public function profile_buying()
    {

        $services = Service::with('pricing', 'descriptions', 'requirements', 'galleries', 'subcategory', 'user')->where('status',1)->get();
		
		// print_r($services); exit;
        // dd( $services);

        return view('profile_buying', compact('services'));
    }

    public function profile_public()
    {
        return view('profile_public');
    }

    public function userProfileUpdate(Request $request)
    {
        $user = Auth::user()->id;

        $update = User::findOrFail($user);

        $data = $request->only(['avatar']);

        if($request->hasFile('avatar')){
            //upload it
          //  $avatar = request('avatar')->store('avatars');
		  
		  $imageName = time().'.'.request()->avatar->getClientOriginalExtension();
		  request()->avatar->move(public_path('avatars'), $imageName);

        } else {
            $avatar = auth()->user()->avatar;
        }


        $update->update([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'time_zone' => $request->input('time_zone'),
            'primary_language' => $request->input('primary_language'),
            'bio' => $request->input('bio'),
            'description' => $request->input('description'),
            'avatar' => $imageName
        ]);
        return back();
    }

    public function userLanguages(Request $request)
    {
        $request->validate([
            'lang_name' => 'required',
            'lang_level' => 'required'
        ]);

        UserLanaguage::create([
            'user_id' => auth()->user()->id,
            'lang_name' => $request->lang_name,
            'lang_level' => $request->lang_level,
        ]);

        return back();
    }

    public function userLanguageDelete($id)
    {
        UserLanaguage::findOrFail($id)->delete();

        return back();
    }

    public function userSkillSave(Request $request)
    {
        SkillUser::create([
            'user_id' => auth()->user()->id,
            'skill_id' => $request->skill_id,
            'skills_level' => $request->skills_level
        ]);

        return back();
    }

    public function userSkillDelete($id)
    {
        SkillUser::findOrFail($id)->delete();
        return back();
    }

    public function userEducationSave(Request $request)
    {
        UserEducation::create([
            'user_id' => auth()->user()->id,
            'country' => $request->country,
            'collage' => $request->collage,
            'degree_title' => $request->degree_title,
            'major' => $request->major,
            'passing_year' => $request->passing_year
        ]);

        return back();
    }

    public function userEducationDestroy($id)
    {
        UserEducation::findOrFail($id)->delete();
        return back();
    }
}


