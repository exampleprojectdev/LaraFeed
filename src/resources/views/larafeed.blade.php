@extends('layouts.app')

@section('title', 'LaraFeed')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">LaraFeed</h1>
    <div class="overflow-x-auto">
        <table class="table-auto border-separate border-spacing-y-2 border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300">#</th>
                    <th class="border border-gray-300">Element</th>
                    <th class="border border-gray-300">Page URL</th>
                    <th class="border border-gray-300">Feedback</th>
                    <th class="border border-gray-300">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td><img src="{{ $feedback->screenshot }}" alt="Selected Element" style="max-width:200px; border:1px solid;" /></td>
                    <td>{{ $feedback->page_url }}</td>
                    <td>{{ $feedback->feedback }}</td>
                    <td>{{ $feedback->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
