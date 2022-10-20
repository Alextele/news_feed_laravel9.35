@extends('layouts.main')

@section('content')
<table id="example" class="table" style="width:100%">
    <thead>
    <tr>
        <th>Sequence number</th>
        <th>Category</th>
        <th>Name</th>
        <th>Publication date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($itemlist as $item)
        @php
            /** @var \App\Models\News $item */
        @endphp
    <tr @if(!$item->is_published) style="background-color: #ccc;" @else style="background-color: #fff;" @endif>
        <td>{{$item->id}}</td>
        <td>{{$item->category->name}}</td>
        <td> <a href="{{route('main.show', $item->id)}}">{{$item->title}}</a> </td>
        <td>{{$item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') : ''}}</td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Sequence number</th>
        <th>Category</th>
        <th>Name</th>
        <th>Publication date</th>
    </tr>
    </tfoot>
</table>
@endsection
