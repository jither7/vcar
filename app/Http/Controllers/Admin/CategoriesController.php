<?php
namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Helpers;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Support\Facades\Redirect;
use yajra\Datatables\Facades\Datatables;


class CategoriesController extends AdminController{

	/**
	 * @return \BladeView|bool|\Illuminate\View\View
	 */
	public function index()
	{
		$terms = Categories::select('id','name','parent')->get()->toArray();
		$terms = Helpers::buildTree($terms);
		return view('admin.categories.index', compact('terms'));
	}

	/**
	 * @param CategoriesRequest $request
	 * @return mixed
	 */
	public function postCreate(CategoriesRequest $request) {
		$term = new Categories();
		$term->name = $request->name;
		$term->slug = Helpers::slug($request->slug);
		if(empty($term->slug)) {
			$term->slug = Helpers::slug($term->name);
		}
		$term->parent = $request->parent;
		$term->description = $request->description;

		$term->save();
		return Redirect('admin/categories')->with('success','Created an categories successfully');
	}

	/**
	 * @param $id
	 * @return \BladeView|bool|\Illuminate\View\View
	 */
	public function getEdit($id) {
		$category = Categories::find($id);
		$id_parent = $category->parent;
		$terms = Categories::select('id','name','parent')->get()->toArray();
		$terms = Helpers::buildTree($terms);
		return view('admin.categories.edit', compact('id_parent','terms', 'category'));
	}
	public function postEdit(CategoriesRequest $request,$id) {
		$term = Categories::find($id);
		$term->name = $request->name;
		$term->slug = Helpers::slug($request->slug);
		if(empty($term->slug)) {
			$term->slug = Helpers::slug($term->name);
		}
		$term->parent = $request->parent;
		$term->description = $request->description;
		if($term instanceof Categories) {
			$term->save();
		}

		return Redirect('admin/categories')->with('success','Update category successfully');
	}

	public function getDelete($id) {
		$category = Categories::find($id);
		if($category && $category instanceof Categories) {
			$category->delete();
		}
		return Redirect('admin/categories')->with('success','Delete category successfully');
	}

	/**
	 * @return mixed
	 */
	public function data()
	{
		$categories = Categories::select('id','name','description','slug')->orderBy('id','desc');

		return Datatables::of($categories)
			->editColumn('name','
				<a href="#"><b>{{$name}}</b></a>
				<div class="row-actions hide">
					<a href="{{{ URL::to(\'admin/categories/edit/\' . $id . \'/\') }}}">Edit</a>
					|
					<a class="delete-tag" href="{{ URL::to(\'admin/categories/delete/\' . $id .\'/\') }}"
						onclick=" return confirm(\'Are you want to delete\')">Delete</a>
					|
					<a href="#">View</a>
				</div>
			')
			->editColumn('id','<input id="cb-select-all-1" type="checkbox" data="{{$id}}">')
			->make();
	}
}