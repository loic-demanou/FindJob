<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;
use Jorenvh\Share\ShareFacade;

// use Jorenvh\Share\Share;

class SocialShareController extends Controller
{
    public function index($id)
    {
        $job = Job::find($id);

        $facebook = ShareFacade::page('http://127.0.0.1:8000/jobs/'.$job->id, $job->title)
        ->facebook()
        ->getRawLinks();

        return view('profiles.social-share', compact('facebook'));

    } 

    public function twitter($id)
    {
        $job = Job::find($id);
        $twitter = ShareFacade::page('http://127.0.0.1:8000/jobs/'.$job->id, $job->title)
        ->twitter()
        ->getRawLinks();
        return view('profiles.social-share', compact('twitter'));
    }

    public function linkedin($id)
    {
        $job = Job::find($id);
        $linkedin = ShareFacade::page('http://127.0.0.1:8000/jobs/'.$job->id, $job->title)
        ->linkedin()
        ->getRawLinks();
        return view('profiles.social-share', compact('linkedin'));
    }

    public function whatsapp($id)
    {
        $job = Job::find($id);
        $whatsapp = ShareFacade::page('http://127.0.0.1:8000/jobs/'.$job->id, $job->title)
        ->whatsapp()
        ->getRawLinks();
        return view('profiles.social-share', compact('whatsapp'));
    }

    public function telegram($id)
    {
        $job = Job::find($id);
        $telegram = ShareFacade::page('http://127.0.0.1:8000/jobs/'.$job->id, $job->title)
        ->telegram()
        ->getRawLinks();
        return view('profiles.social-share', compact('telegram'));
    }

}
