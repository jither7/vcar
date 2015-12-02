@extends('admin.app')

@section('title') Admin | Products @endsection

@section('css')
<link rel="stylesheet" href="{{{ asset('assets/admin/bootstrap/css/bootstrap-chosen.css') }}}"/>
@endsection

    @section('container')
    <div class="row">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Quick Example</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post"
                  action="@if( isset($products)){{ URL::to('admin/products/'. $products->id .'/edit')  }} @endif"
                  autocomplete="off" enctype="multipart/form-data"  >
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <div class="box-body">
                    <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name"
                            value="{{{ Input::old('name', isset($products) ? $products->name : null ) }}}" >
                        {!!$errors->first('name','<label class="control-label">:message</label>')!!}

                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="form-group {{{ $errors->has('price') ? 'has-error' : '' }}}">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price"
                               value="{{{ Input::old('price', isset($products) ? $products->price : null ) }}}" >
                        {!!$errors->first('price','<label class="control-label">:message</label>')!!}
                    </div>

                    <div class="form-group {{{ $errors->has('size[]') ? 'has-error' : '' }}}">
                        <label for="">Size</label>
                        <select data-placeholder="Select size ..." multiple class="chosen-select form-group" name="size[]" tabindex="8">
                            <option value="X">X</option>
                            <option value="M">M</option>
                            <option value="S">S</option>
                            <option value="L">L</option>
                        </select>
                        {!!$errors->first('size[]','<label class="control-label">:message</label>')!!}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        @if	(isset($products))
                            Edit
                        @else
                            Create
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection

@section('js')
<script src="{{{ asset('assets/admin/js/chosen.js') }}}"></script>
<script>
    $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
    });
</script>
@endsection
