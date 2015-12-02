@extends('admin.app')
    @section('title')
        Dashboard
    @endsection
    @section('css')
        <style>
            #terms_length {display: none;}
            #terms_filter {display: none;}
        </style>
    @endsection
    @section('container')

        @if(session('success'))
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Alert!</strong> {{ session('success') }}
            </div>
        @endif

        <div class="page-header">
            <h3>Categories </h3>
        </div>
        <div class="row" id="categories">
            <div class="col-md-5">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title">Add New Category</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{{ URL::to('admin/categories/postCreate') }}}" method="post" autocomplete="off">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                            <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name"
                                       value="{{{ Input::old('name') }}}">
                                <i>The name is how it appears on your site.</i>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{{ Input::old('slug') }}}">
                                <i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i>
                            </div>
                            <div class="form-group">

                                <label for="exampleInputPassword1">Parent</label>
                                <select class="form-control" name="parent" id="">

                                    <option value="0">None</option>
                                    {!! \App\Helpers::printTree($terms) !!}
                                </select>
                                <i>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</i>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="5">{{{ Input::old('description') }}}</textarea>
                                <i>The description is not prominent by default; however, some themes may show it.</i>
                            </div>

                            <button type="submit" class="btn btn-primary">Add New Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7" style="background: #fff">
                <div class="panel-body" >
                    <table class="table table-striped" id="terms">
                        <thead>
                        <tr>
                            <th><input id="cb-select-all-1" type="checkbox"></th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Slug</th>
                        </tr>
                        </thead>

                    </table>
                </div>

            </div>
        </div>

    @endsection
{{-- Scripts --}}
@section('jquery')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#terms').DataTable({
                ajax : "{{ url('admin/categories/data') }}",
            });

            $(document).on('mouseover', '#terms tr', function(){
                $(this).find('.row-actions').removeClass('hide');
            }).mouseout(function(){
                $(this).find('.row-actions').addClass('hide');
            });

        });


    </script>
@endsection