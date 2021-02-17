<div class="form-group">
    <input name="title" type="text" value="{{ old('title') ?? $post->title ?? '' }}" class="form-control" required>
</div>
<div class="form-group">
    <textarea name="desc" cols="10" rows="3" class="form-control">{{ old('desc') ?? $post->desc ?? '' }}</textarea>
</div>
<div class="form-group">
    <input name="image" type="file">
</div>