<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class SettingController extends Controller
{
    public function socialSetting(){

    	$social = DB::table('socials')->first();

    	return view('backend.setting.social', compact('social'));
    }

    public function socialUpdate(Request $request, $id){

    	$data = array();

		$data['facebook'] = $request->facebook;
		$data['twitter'] = $request->twitter;
		$data['youtube'] = $request->youtube;
		$data['linkedin'] = $request->linkedin;
		$data['instagram'] = $request->instagram;

		DB::table('socials')->where('id', $id)->update($data);

			$notification = array(

    			'message' => 'Socials Updated Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('social.setting')->with($notification);
    }


        public function seoSetting(){

    	$seo = DB::table('seos')->first();

    	return view('backend.setting.seo', compact('seo'));
    }

    public function seoUpdate(Request $request, $id){

    	$data = array();

		$data['meta_author'] = $request->meta_author;
		$data['meta_title'] = $request->meta_title;
		$data['meta_keyword'] = $request->meta_keyword;
		$data['meta_description'] = $request->meta_description;
		$data['google_analytics'] = $request->google_analytics;
		$data['gooogle_verification'] = $request->gooogle_verification;
		$data['alexa_analytics'] = $request->alexa_analytics;

		DB::table('seos')->where('id', $id)->update($data);

			$notification = array(

    			'message' => 'Seo Setting Updated Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('seo.setting')->with($notification);
    }

    public function prayerSetting(){

    $prayer = DB::table('prayers')->first();

    return view('backend.setting.prayer', compact('prayer'));
    }

    public function updatePrayer(Request $request, $id){

         $data = array();

        $data['monday'] = $request->monday;
        $data['tuesday'] = $request->tuesday;
        $data['wednesday'] = $request->wednesday;
        $data['thursday'] = $request->thursday;
        $data['friday'] = $request->friday;
        $data['suterday'] = $request->suterday;

        DB::table('prayers')->where('id', $id)->update($data);

            $notification = array(

                'message' => 'Prayer Setting Updated Successfully',
                'alert-type' => 'success',
            );

        return Redirect()->route('prayer.setting')->with($notification);
    }

    public function liveTvSetting(){

        $livetv = DB::table('live_tvs')->first();

        return view('backend.setting.livetv', compact('livetv'));
    }

    public function updateLiveTv(Request $request, $id){

         $data = array();

        $data['embed_code'] = $request->embed_code;

        DB::table('live_tvs')->where('id', $id)->update($data);

            $notification = array(

                'message' => 'Live Tv Setting Updated Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('livetv.setting')->with($notification);
    }

    public function activateTvSetting(Request $request, $id){

         DB::table('live_tvs')->where('id', $id)->update(['status' => 1 ]);

             $notification = array(

                'message' => 'Live Tv Setting Activated Successfully',
                'alert-type' => 'success',
            );

         return Redirect()->back()->with($notification);
    }

    public function desactivateTvSetting(Request $request, $id){

         DB::table('live_tvs')->where('id', $id)->update(['status' => 0 ]);

             $notification = array(

                'message' => 'Live Tv Setting DesActivated Successfully',
                'alert-type' => 'success',
            );

         return Redirect()->back()->with($notification);
    }

    public function noticeSetting(){

        $notice = DB::table('notices')->first();

        return view('backend.setting.notice', compact('notice'));
    }

    public function updateNotice(Request $request, $id){

         $data = array();

        $data['notice'] = $request->notice;

        DB::table('notices')->where('id', $id)->update($data);

            $notification = array(

                'message' => 'Notice Setting Updated Successfully',
                'alert-type' => 'success',
            );

        return Redirect()->route('notice.setting')->with($notification);

    }

    public function activateNotice(Request $request, $id){

         DB::table('notices')->where('id', $id)->update(['status' => 1 ]);

             $notification = array(

                'message' => 'Notice Setting Activated Successfully',
                'alert-type' => 'success',
            );

         return Redirect()->back()->with($notification);
    }

    public function desactivateNotice(Request $request, $id){

         DB::table('notices')->where('id', $id)->update(['status' => 0 ]);

             $notification = array(

                'message' => 'Notice Setting DesActivated Successfully',
                'alert-type' => 'success',
            );

         return Redirect()->back()->with($notification);
    }
}
