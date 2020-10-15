<div class="row">
    <div class="col-lg-7">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                @if($is_create)
                    <h5>Create new post</h5>
                @else
                    <h5>Edit post</h5>
                @endif
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" value="{{ isset($post)?$post->title:old('title') }}" type="text"
                                   placeholder="Enter title" class="form-control">
                            @error('title')
                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <label>Image</label>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                    <span class="fileinput-filename"></span>
                                </div>
                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Select file</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input name="img" type="file" accept="image/*">
                                </span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                   data-dismiss="fileinput">Remove</a>
                            </div>
                            @error('img')
                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label>
                                @php($check_status = isset($post) ? $post->status : old('status'))
                                <input name="status"
                                       {{ $check_status ? 'checked':'' }}
                                       type="checkbox" class="i-checks">
                                Publication Status
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Categories and Tags</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12">

                        <div id="categories-section" class="form-group" style="margin-bottom: 0">
                            <label>Select Categories</label>

                            <select name="categories[]" class="tokenize-categories" multiple>
                                {{--@php($post_categories = $post->categories->pluck('id')->toArray())--}}
                                @foreach($categories as $category)
                                    {{--<option value="{{ $category->id }}" {{ isset($post) ? in_array($category->id, $post_categories) ? 'selected':'' : '' }} >{{ $category->name }}</option>--}}
                                    <option
                                        value="{{ $category->id }}" {{ isset($post) ? 'selected' : '' }} >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div id="tags-section" class="form-group" style="margin-bottom: 0">
                            <label>Select Tags</label>
                            <select name="tags[]" class="tokenize-tags" multiple>
                                @foreach($tags as $tag)
                                    <option
                                        value="{{ $tag->id }}" {{ isset($post) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button class="btn btn-danger" style="margin-bottom: 0" type="submit"><strong><i
                                        class="fa fa-arrow-left"></i> Back</strong></button>
                            <button class="btn btn-primary" style="margin-bottom: 0" type="submit"><strong><i
                                        class="fa fa-upload"></i> Published</strong></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Body</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea name="body" rows="6"
                                      class="summernote form-control">{{ html_entity_decode(isset($post)?$post->body:old('body')) }}</textarea>
                            @error('body')
                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('custom-js')
    <script>

        $('.tokenize-categories').tokenize2({
            dataSource: function (term, object) {

                $.get('{{ route('get-category-list') }}', {term: term}, function (response) {
                    object.trigger('tokenize:dropdown:fill', [response]);
                });
            },

            placeholder: "e.g. (laravel javascript vueJs)",
            searchFromStart: false,
            displayNoResultsMessage: true,
            noResultsMessageText: "No results mached '%s'"
        });


        $('.tokenize-tags').tokenize2({
            dataSource: function(term, object){

                $.get('{{ route('get-tag-list') }}', {term:term}, function (response) {
                    object.trigger('tokenize:dropdown:fill', [response]);
                });
            },

            placeholder: "e.g. (wordpress jquery regex)",
            searchFromStart: false,
            displayNoResultsMessage: true,
            noResultsMessageText: "No results mached '%s'",
        });

    </script>
@endsection
