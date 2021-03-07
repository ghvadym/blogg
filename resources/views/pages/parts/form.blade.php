<div class="form-group">
    <span>Title</span>
    <input id="post-title" name="title" type="text" value="{{ old('title') ?? $post->title ?? '' }}" class="form-control" required>
</div>
<div class="form-group">
    <span>Post content</span>
    <textarea id="post-description" name="desc" cols="10" rows="3" class="form-control">{{ old('desc') ?? $post->desc ?? '' }}</textarea>
</div>
<div class="form-group">
    <span>Post thumbnail</span>
    <input name="image" type="file" value="{{ old('img') ?? '' }}">
</div>