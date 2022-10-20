@extends('layouts.main')

@section('content')
    @php
        /** @var \App\Models\News $item */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Published at {{\Carbon\Carbon::parse($item->published_at)->format('d/m/Y')}}
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="maindata" role="tabpanel">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input  name="category" value="{{$item->category->name}}"
                                                    id="category"
                                                    type="text"
                                                    class="form-control"
                                                    disabled="disabled">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Name</label>
                                            <input  name="title" value="{{$item->title}}"
                                                    id="title"
                                                    type="text"
                                                    class="form-control"
                                                    disabled="disabled">
                                        </div>
                                        <div class="form-group">
                                            <label for="item_id">Sequence number</label>
                                            <input  name="item_id" value="{{$item->id}}"
                                                    id="item_id"
                                                    type="text"
                                                    class="form-control"
                                                    disabled="disabled">
                                        </div>
                                        <div class="form-group">
                                            <label for="content_raw">Content</label>
                                            <textarea name="content_raw"
                                                      id="content_raw"
                                                      class="form-control"
                                                      rows="15"
                                                      disabled="disabled"> {{$item->content}} </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
