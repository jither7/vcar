@extends('admin.app')
@section('title')
    Dashboard
@endsection

@section('container')
    <div class="page-header">
        <h3>News </h3>
    </div>
    <div class="row" id="categories">
        <form action="@if(isset($news)){{ URL::to('admin/news/edit/'. $news->id) }}
                                  @else {{ URL::to('admin/news/postCreate') }} @endif"
              method="post" autocomplete="off">
            <div class="col-md-8">
                <div class="panel panel-white">

                    <div class="panel-body">


                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                            <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title"
                                       value="{{{ Input::old('title', isset($news) ? $news->title : null) }}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" id="editor1" class="form-control" id="" cols="30" rows="5">{{{ Input::old('description', isset($news) ? $news->description : null) }}}</textarea>

                            </div>

                            <button type="submit" class="btn btn-primary">Edit Category</button>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                hello
            </div>
        </form>
    </div>

@endsection
{{-- Scripts --}}
@section('jquery')
    <script src="{{{ asset('assets/admin/plugins/ckeditor/ckeditor.js') }}}"></script>
    <script>
        $(function(){
            CKEDITOR.replace('editor1');
        });
    </script>
@endsection