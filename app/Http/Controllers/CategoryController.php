<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Exceptions\CategoryDeleteException;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Category::get();
        return view('admin.categories', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'category_name' => 'required|string',
        ]);

        Category::create($data);
        return redirect()->route('categories');
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
        $cat = Category::findOrFail($id);
        return view('admin.updatecategory', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate([
            'category_name' => 'required|string',
        ]);

        Category::where('id', $id)->update($data);   
     
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $category = Category::findOrFail($id);

            if ($category->cars()->exists()){
                throw new CategoryDeleteException();
            }

            $category->delete();
            return redirect()->route('categories')->with('success', 'Category deleted successfully.');
        } 
        
        catch (CategoryDeleteException $e){
            return redirect()->back()->with('error', 'You cannot delete a category associated with a car.');
        } 
        
        catch (\Exception $e){
            return redirect()->back()->with('error', 'Error deleting category.');
        }
    }
}
