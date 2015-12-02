@extends('admin.app')
@section('title')
    Dashboard
@endsection

@section('container')
    <div class="page-header">
        <h3>Categories </h3>
    </div>
    <div class="row" id="categories">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">Edit Category</h3>
                </div>
                <div class="panel-body">
                    <form action="{{{ URL::to('admin/categories/edit/'. $category->id) }}}" method="post" autocomplete="off">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                        <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{{ Input::old('name', isset($category) ? $category->name : null) }}}">
                            <i>The name is how it appears on your site.</i>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{{ Input::old('slug', isset($category) ? $category->slug : null) }}}">
                            <i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Parent</label>
                            <select class="form-control" name="parent" id="">
                                <option value="0">None</option>
                                {!! \App\Helpers::printTree($terms, $id_parent) !!}

                            </select>
                            <i>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</i>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="5">{{{ Input::old('description', isset($category) ? $category->description : null) }}}</textarea>
                            <i>The description is not prominent by default; however, some themes may show it.</i>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Category</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
{{-- Scripts --}}
@section('jquery')

@endsection