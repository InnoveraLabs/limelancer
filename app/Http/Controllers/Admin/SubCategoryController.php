<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::with('parent')->get();
        return  view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return  view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//print_r($request->all()); exit;
        $request->validate([
            'category_id' => 'required',
            'sub_c_name' => 'required'
        ]);
		
		$imageName = time().'.'.request()->sub_c_image->getClientOriginalExtension();
		request()->sub_c_image->move(public_path('logo'), $imageName);

        SubCategory::create([
            'category_id' => $request->category_id,
            'sub_c_name' => $request->sub_c_name,
			'sub_c_home' => $request->sub_c_home,
            'sub_c_slug' => Str::slug($request->sub_c_name),
			'sub_c_image' => $imageName,
        ]);

        return redirect()->route('admin.subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subCategory = SubCategory::find($id);

        return view('admin.subcategory.edit', compact('categories', 'subCategory'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$subCategory = SubCategory::findOrFail($id);		
        $subCategory->update($request->all());

        return redirect()->route('admin.subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::findOrFail($id)->delete();
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function get_by_category(Request $request)
    {
        if (!$request->category_id) {
            $html = '<option value="">'.'Please Select a Category'.'</option>';
        } else {
            $html = '';
            $subcategories = SubCategory::where('category_id', $request->category_id)->get();
            foreach ($subcategories as $subcategory) {
                $html .= '<option value="'.$subcategory->id.'">'.$subcategory->sub_c_name.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }
}
