<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\Faq;
use App\Models\Guide;
use App\Models\PageContent;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function mission()
    {
        $content = PageContent::first()->mission;
        $title = "mission";
        return view('frontend_new.additional_page.index', compact(['content', 'title']));
    }
    public function vision()
    {
        $content = PageContent::first()->vision;
        $title = "vision";
        return view('frontend_new.additional_page.index', compact(['content', 'title']));
    }
    public function tos()
    {
        $content = PageContent::first()->terms;
        $title = "terms_and_conditions";
        return view('frontend_new.additional_page.index', compact(['content', 'title']));
    }
    public function about_us()
    {
        $content = App::getLocale() == 'en' ? PageContent::first()->about_us_en :  PageContent::first()->about_us;
        $title = App::getLocale() == 'en' ? "About Us" : "আমাদের সম্পর্কে";
        return view('frontend_new.about_us.index', compact(['content', 'title']));
    }
    
    public function admin_info()
    {
        $content = PageContent::first()->admin_info;
        $title = "admin_info";
        return view('frontend_new.additional_page.index', compact(['content', 'title']));
    }
    public function privacy_policy()
    {
        $content = PageContent::first()->privacy_policy;
        $title = "privacy_policy";
        return view('frontend_new.additional_page.index', compact(['content', 'title']));
    }
    public function refund_policy()
    {
        $content = PageContent::first()->refund_policy;
        $title = "refund_policy";
        return view('frontend_new.additional_page.index', compact(['content', 'title']));
    }
    public function achievement()
    {
        $content = PageContent::first()->achievement;
        $title = "achievement";
        return view('frontend_new.additional_page.index', compact(['content', 'title']));
    }
    public function success()
    {
        $successList = SuccessStory::orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.success.index', compact("successList"));
    }
    public function successSingle($id)
    {
        $success = SuccessStory::find($id);
        return view('frontend.success.successSingle', compact("success"));
    }

    public function faq()
    {
        $faqs = Faq::where('status', "1")->get();
        return view('frontend_new.faq.index', compact('faqs'));
    }
    public function contact_us()
    {
        return view('frontend_new.contact_us.index');
    }
    public function contact_submission(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $form = new ContactForm();
        $form->name = $request->name;
        $form->email = $request->email;
        $form->subject = $request->subject;
        $form->message = $request->message;
        $form->save();

        return back()->with('success', 'Your message has been sent successfully!');
    }
    public function guide()
    {
        $guides = Guide::where('status', "1")->get();
        return view('frontend_new.guide.index', compact('guides'));
    }
}
