<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimony = Testimonial::get();
        return view('admin.testimonials', compact('testimony'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addtestimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'content' => 'required|string|max:100',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        $filename = $this->uploadfile($request->image, 'assets/images');
        $data['image'] = $filename;

        $data['published'] = isset($request['published']);

        Testimonial::create($data);
        return redirect()->route('testimonials');
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
        $testimony = Testimonial::findOrFail($id);
        return view('admin.updatetestimonial', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'content' => 'required|string|max:100',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048'
        ]); 
     
        if($request->hasFile('image')){
            $filename = $this->uploadfile($request->image, 'assets/images');
            $data['image'] = $filename;
        }

        $data['published'] = isset($request['published']);
               
        Testimonial::where('id', $id)->update($data);   
     
        return redirect()->route('testimonials');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Testimonial::where('id', $id)->delete();
        return redirect()->route('testimonials');
    }

    public function trashed()
    {
        $testimony = Testimonial::onlyTrashed()->get();
        return view('admin.trashedtestimonial', compact('testimony'));
    }

    public function restore(string $id): RedirectResponse
    {
        Testimonial::where('id', $id)->restore();
        return redirect()->route('testimonials');
    }

    public function fd(string $id): RedirectResponse
    {
        Testimonial::where('id', $id)->forceDelete();
        return redirect()->route('trashedtestimonial');
    }
}
