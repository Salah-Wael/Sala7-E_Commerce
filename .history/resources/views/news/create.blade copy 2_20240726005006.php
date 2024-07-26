<div class="contact-form">
    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <p>
            <input style="width: 100%;" type="text" placeholder="Post Title" name="title" value="{{ old('title') }}">
            @if($errors->has('title'))
        <div class="alert alert-danger">
            @error('title')
            {{ $message }}
            @enderror
        </div>
        @endif
        </p>
        <p>
            <textarea name="content" cols="30" rows="10" placeholder="Description">{{ old('content') }}</textarea>
            @if($errors->has('content'))
        <div class="alert alert-danger">
            @error('content')
            {{ $message }}
            @enderror
        </div>
        @endif
        </p>
        <div class="form-group">
            @forelse ($tags as $tag)
            <input class="contact-form" type="checkbox" id="{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
            <label class="form-label" for="{{ $tag->id }}">{{ $tag->tag }}</label>
            @empty
            <p>No tags available.</p>
            @endforelse
        </div>
        @if($errors->has('tags'))
        <div class="alert alert-danger">
            @error('tags')
            @foreach($errors->get('tags') as $message)
            {{ $message }}
            @endforeach
            @enderror
        </div>
        @endif
        <div class="form-group">
            <label class="col-md-4 col-form-label text-md-end" for="categoryTag">{{ __('Category Tag') }}</label>
            <div class="col-md-6">
                <select class="col-md-6 form-control" id="categoryTag" name="category_tag">
                    @forelse ($categoryTags as $categoryTag)
                    <option value="{{ $categoryTag->id }}" {{ in_array($categoryTag->id, old('category_tag', [])) ? 'selected' : '' }}>{{ $categoryTag->tag }}</option>
                    @empty
                    <option value="">No category tags available</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="post-image">Image</label>
            <input class="contact-form" type="file" name="image" id="post-image" accept=".jpeg, .jpg, .png, .jfif, .svg">
        </div>
        @if($errors->has('image'))
        <div class="alert alert-danger">
            @error('image')
            {{ $message }}
            @enderror
        </div>
        @endif
        <p><input type="submit" value="Submit"></p>
    </form>
</div>