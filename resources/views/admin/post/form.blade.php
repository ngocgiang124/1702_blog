@extends('layouts.admin')
@section('title', 'Category management')
@section('content')
	<div class="col-sm-12">
		<form action="{{route('cate.save')}}" method="post" novalidate>
			{{csrf_field()}}
			<input type="hidden" name="id" value="{{$model->id}}">
			<div class="form-group">
				<label for="title">Title</label>
				<input id="title" type="text" 
					value="{{old('title', $model->title)}}" name="title" class="form-control" placeholder="Post title">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('title')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="cate-parent">Category</label>
				<select name="cate_id" class="form-control">
					<option value="0">--------------</option>
					@foreach ($listCate as $key => $value)
						@php
							$key = str_replace("x", "", $key);
							$selected = $model->cate_id == $key ? "selected" : null;
						@endphp

						<option value="{{$key}}" {{$selected}}>{{$value}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" name="image" class="form-control">
			</div>
			<div class="form-group">
				<label for="author">Author</label>
				<input type="text" name="author" value="{{$model->author}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="short_desc">Short Description</label>
				<textarea name="short_desc" class="form-control" id="short_desc" >
					{{$model->short_desc}}
				</textarea>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" class="form-control" id="content" >
					{{$model->content}}
				</textarea>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-success">Submit</button>
				<a href="{{route('cate.list')}}" class="btn btn-warning">Cancel</a>
			</div>
		</form>

	</div>

@endsection
@section('js')
  <script>
    ckeditor('short_desc');
    ckeditor('content');
</script>
@endsection