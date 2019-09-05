<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $data = [];
        $data['categories'] = Category::select('id', 'name', 'slug', 'status')->paginate(5);
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'LinkedIn' => 'https://linkedin.com'
        ];
        return view('frontend.categories.index', $data);
    }

    public function create()
    {
        $data = [];
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'LinkedIn' => 'https://linkedin.com'
        ];

        return view('frontend.categories.create', $data);
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'name' => 'required|min:5|unique:categories,name',
            'status' => 'required'
        ]);

        //database insert
        $data = [
            'name' => trim($request->input('name')),
            'slug' => str_slug(trim($request->input('name'))),
            'status' => $request->input('status'),
        ];
        try {
            Category::create($data);

            session()->flash('message', 'New category added successfully');
            session()->flash('type', 'success');

            return redirect()->route('frontend.categories.index');
        } catch (Exception $e) {
            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            //redirect

            return redirect()->back();
        }
    }

    public function show($id)
    {
        $data = [];
        $data['category'] = Category::select('id', 'name', 'slug', 'status', 'created_at')->find($id);
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'LinkedIn' => 'https://linkedin.com'
        ];
        return view('frontend.categories.show', $data);
    }

    public function edit($id)
    {
        $data = [];
        $data['category'] = Category::select('id', 'name', 'slug', 'status', 'created_at')->find($id);
        $data['links'] = [
            'Facebook' => 'https://facebook.com',
            'Twitter' => 'https://twitter.com',
            'Google' => 'https://google.com',
            'LinkedIn' => 'https://linkedin.com'
        ];
        return view('frontend.categories.edit', $data);
    }

    public function update($id,Request $request)
    {
        //validation
        $category=Category::find($id);
        $this->validate($request, [
            'name' => 'required|min:5|unique:categories,name,'.$category->id,
            'status' => 'required'
        ]);

        //database insert

        $data = [
            'name' => trim($request->input('name')),
            'slug' => str_slug(trim($request->input('name'))),
            'status' => $request->input('status'),
        ];
        try {

            $category->update($data);

            session()->flash('message', 'Category updated successfully');
            session()->flash('type', 'success');

            return redirect()->route('frontend.categories.show',$id);
        } catch (Exception $e) {
            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            //redirect

            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $category=Category::find($id);
        $category->delete();

        session()->flash('type', 'success');
        session()->flash('message', 'Category deleted');
        return redirect()->route('frontend.categories.index');
    }

}
