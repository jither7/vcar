<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class NewsController extends Controller {

	/**
	 * @return \BladeView|bool|\Illuminate\View\View
	 */
	public function index(){
		return view('admin.news.index');
	}

	public function getCreate(){
		return view('admin.news.create_edit');
	}
}