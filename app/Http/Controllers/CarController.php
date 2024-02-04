<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;
use App\Models\Category;
use App\Models\Car;

class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car = Car::get();
        return view('admin.cars', compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::select('id', 'category_name')->get();
        return view('admin.addcar', compact('cat'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string',
            'date_posted' =>'required|date',
            'content' => 'required|string|max:200',
            'luggage' => 'required|integer',
            'doors' => 'required|integer',
            'passengers' => 'required|integer',
            'price' => 'required|decimal:0,2',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        $filename = $this->uploadfile($request->image, 'assets/images');
        $data['image'] = $filename;

        $data['published'] = isset($request['published']);

        Car::create($data);
        return redirect()->route('cars');
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
        $car = Car::findOrFail($id);
        $cat = Category::select('id', 'category_name')->get();
        return view('admin.updatecar', compact('car', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string',
            'date_posted' =>'required|date',
            'content' => 'required|string|max:200',
            'luggage' => 'required|integer',
            'doors' => 'required|integer',
            'passengers' => 'required|integer',
            'price' => 'required|decimal:0,2',
            'category_id' => 'required|exists:categories,id',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048'
        ]); 
     
        if($request->hasFile('image')){
            $filename = $this->uploadfile($request->image, 'assets/images');
            $data['image'] = $filename;
        }

        $data['published'] = isset($request['published']);
               
        Car::where('id', $id)->update($data);   
     
        return redirect()->route('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Car::where('id', $id)->delete();
        return redirect()->route('cars');
    }

    public function trashed()
    {
        $car = Car::onlyTrashed()->get();
        return view('admin.trashedcar', compact('car'));
    }

    public function restore(string $id): RedirectResponse
    {
        Car::where('id', $id)->restore();
        return redirect()->route('cars');
    }

    public function fd(string $id): RedirectResponse
    {
        Car::where('id', $id)->forceDelete();
        return redirect()->route('trashedcar');;
    }
}
