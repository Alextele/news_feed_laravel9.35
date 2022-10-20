@php
    /** @var \App\Models\News $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Published
                @else
                    Draft
                @endif
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main" type="button" role="tab" aria-controls="main" aria-selected="true">Main data</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab" aria-controls="add" aria-selected="false">Additional data</button>
                    </li>
                </ul>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input  name="title" value="{{$item->title}}"
                                    id="title"
                                    type="text"
                                    class="form-control"
                                    minlength="3"
                                    required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content"
                                      id="content"
                                      class="form-control"
                                      rows="15"> {{old('content', $item->content)}} </textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholder="Select a category"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{$categoryOption->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check">
                            <input  name="is_published"
                                    type="hidden"
                                    value="0">
                            <input  name="is_published"
                                    type="checkbox"
                                    class="form-check-input"
                                    value="1"
                                    @if($item->is_published)
                                    checked="checked"
                                @endif>
                            <label class="form-check-label" for="is_published">Publish</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
