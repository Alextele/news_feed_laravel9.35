@extends('layouts.main')

@section('content')
    @php
        /** @var \App\Models\News $item */
    @endphp
    <div class="container">
        @include('manager.includes.result_messages')

        @if($item->exists)
            <form method="POST" action="{{route('manager.update', $item->id)}}">
                @method("PATCH")
                @else
                    <form method="POST" action="{{route('manager.store')}}">
                        @endif
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('manager.includes.edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('manager.includes.edit_add_col')
                            </div>
                        </div>
                    </form>

                    @if($item->exists)
                        <br>
                        <form method="POST" action="{{route('manager.destroy', $item->id)}}">
                            @method('DELETE')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button type="submit" class="btn btn-link">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
        @endif
    </div>
@endsection
