@extends('admin.master')

@section('homeContent')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="border-radius:10px;overflow:hidden;">
                <div class="panel-heading" style="padding:18px 20px;">
                    <h3 style="margin:0;font-weight:700;">{{ $category->exists ? 'Update Product Category' : 'Create Product Category' }}</h3>
                </div>
                <form action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($category->exists) @method('PUT') @endif
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>Please fix the following:</strong>
                                <ul style="margin-bottom:0;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Category Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required maxlength="150" placeholder="e.g. Living Room">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug (optional)</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $category->slug) }}" maxlength="180" placeholder="Automatically generated from category name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control" maxlength="2000" placeholder="Short category description">{{ old('description', $category->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Category Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/*">
                            <small class="text-muted">JPG, PNG or WEBP; maximum 2 MB.</small>
                            @if($category->image)
                                <div style="margin-top:12px;">
                                    <img src="{{ asset('uploads/categories/'.$category->image) }}" alt="{{ $category->name }}" style="width:100px;height:100px;object-fit:cover;border-radius:8px;">
                                </div>
                            @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->exists ? $category->is_active : true) ? 'checked' : '' }}>
                                Active (show this category on the homepage)
                            </label>
                        </div>
                    </div>
                    <div class="panel-footer" style="display:flex;justify-content:flex-end;gap:10px;">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{ $category->exists ? 'Update Category' : 'Create Category' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
