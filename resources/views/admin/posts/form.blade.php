<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($post->title) ? $post->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label for="slug" class="control-label">{{ 'Slug' }}</label>
    <textarea class="form-control" rows="5" name="slug" type="textarea" id="slug" >{{ isset($post->slug) ? $post->slug : ''}}</textarea>
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('perex') ? 'has-error' : ''}}">
    <label for="perex" class="control-label">{{ 'Perex' }}</label>
    <textarea class="form-control" rows="5" name="perex" type="textarea" id="perex" >{{ isset($post->perex) ? $post->perex : ''}}</textarea>
    {!! $errors->first('perex', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">
    <label for="published_at" class="control-label">{{ 'Published At' }}</label>
    <textarea class="form-control" rows="5" name="published_at" type="textarea" id="published_at" >{{ isset($post->published_at) ? $post->published_at : ''}}</textarea>
    {!! $errors->first('published_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="control-label">{{ 'Enabled' }}</label>
    <div class="radio">
    <label><input name="enabled" type="radio" value="1" {{ (isset($post) && 1 == $post->enabled) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="enabled" type="radio" value="0" @if (isset($post)) {{ (0 == $post->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
