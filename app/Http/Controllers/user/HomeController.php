<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Testmonial;
use App\Models\Slider;
use App\Models\Work;
use App\Models\Service;
use App\Models\Contact;
use App\Http\Requests\user\ContactRequest;
use App\Models\Plan;
use App\Models\Blog;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $testmonials = Testmonial::take(5)->get();
        $works = Work::withTranslation()->get();
        $sliders = Slider::paginate(15);
        $portfolios = Portfolio::withTranslation()->get();
        $portfolios_all = Portfolio::withTranslation()->orderBy('created_at', 'desc')->paginate(6);
        $services = Service::withTranslation()->paginate(13);
        $plans = Plan::withTranslation()->take(4)->get();
        $blogs = Blog::withTranslation()->orderBy('id', 'desc')->take(4)->get();
        return view('user.home', ['works' => $works,
            'portfolios' => $portfolios,
            'portfolios_all' => $portfolios_all,
            'testmonials' => $testmonials,
            'sliders' => $sliders, 'services' => $services,
            'plans' => $plans, 'blogs' => $blogs]);
    }

    public function customers()
    {
        $sliders = Slider::paginate(10);
        return view('user.pages.customers', ['sliders' => $sliders]);
    }

    //for our-works section
    public function works()
    {
        $works = Work::withTranslation()->get();
        $portfolios = Portfolio::orderBy('created_at', 'desc')->paginate(6);
        return view("user.pages.works", ['works' => $works, 'portfolios' => $portfolios]);
    }

    //get all services
    public function services()
    {
        $services = Service::withTranslation()->paginate(12);
        return view("user.pages.services", ['services' => $services]);
    }

    //get all jobss
    public function jobs()
    {
        $jobs = Job::withTranslation()->paginate(12);
        return view("user.pages.jobs", ['jobs' => $jobs]);
    }

    //service details
    public function single_service($locale, $service)
    {
        $service = Service::findorfail($service);
        return view("user.pages.single_service", ['service' => $service]);
    }

    public function single_job($locale, $job)
    {
        $job = Job::findorfail($job);
        return view("user.pages.single_job", ['job' => $job]);
    }

    //get form of contact us section
    public function getContactUs()
    {
        return view("user.pages.contactus");
    }

    //save contact us messages into db;
    public function handleContactUs($locale, ContactRequest $request)
    {
        try {
            $data = $request->all();
            $contact = Contact::create($data);
            Mail::to(CONTACT_MAIL)->send(new ContactMail($contact));
            return response()->json(['success' => trans('user.success')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    // return all blogs
    public function blogs()
    {
        $works = Work::withTranslation()->get();
        $blogs = Blog::withTranslation()->orderBy('id', 'desc')->paginate(3);
        return view("user.pages.blogs", ['blogs' => $blogs, 'works' => $works]);
    }

    public function single_blog($locale, $blog)
    {
        $works = Work::withTranslation()->get();
        $blog = Blog::findorfail($blog);
        $blogs = Blog::withTranslation()->orderBy('id', 'desc')->take(3)->get();
        return view("user.pages.single_blog", ['blog' => $blog, 'blogs' => $blogs, 'works' => $works]);
    }

    //get about us page
    public function aboutus()
    {
        return view("user.pages.about");
    }

    //to get prices and plans
    public function plans()
    {
        $plans = Plan::withTranslation()->paginate(6);
        return view("user.pages.plans", ['plans' => $plans]);
    }

}
