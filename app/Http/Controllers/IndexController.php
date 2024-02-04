<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Car;
use App\Models\Testimonial;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car = Car::where('published', 1)->orderBy('date_posted', 'desc')->orderBy('id', 'desc')->take(6)->get(); //primary sorting criterion: date_posted, and in case of same time posting, then secondary sorting criterion: id
        $testimony = Testimonial::where('published', 1)->orderBy('created_at', 'desc')->orderBy('id', 'desc')->take(3)->get(); //primary sorting criterion: created_at, and in case of same time creation, ie., using faker then secondary sorting criterion: id
        return view('index', compact('car', 'testimony'));
    }

    public function listing()
    {
        $car = Car::where('published', 1)->orderBy('date_posted', 'desc')->orderBy('id', 'desc')->paginate(6);
        $testimony = Testimonial::where('published', 1)->orderBy('created_at', 'desc')->orderBy('id', 'desc')->take(3)->get();
        return view('listing', compact('car', 'testimony'));
    }

    public function single(string $id)
    {
        $car = Car::findOrFail($id);
        $cat = Category::withCount('publishedcars')->get();
        return view('single', compact('car', 'cat'));
    }

    public function testimonials()
    {
        $testimony = Testimonial::where('published', 1)->orderBy('created_at', 'desc')->orderBy('id', 'desc')->get();
        return view('testimonials', compact('testimony'));
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function error404()
    {
        return view('404');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
