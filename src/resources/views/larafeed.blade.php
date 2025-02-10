@extends('layouts.app')

@section('title', 'LaraFeed')

@section('content')





<div class="flex min-h-screen items-center justify-center bg-white">
    <div class="p-6 overflow-scroll px-0">
        <h1 class="text-2xl font-bold mb-4">LaraFeed</h1>
  <table class="w-full min-w-max table-auto text-left">
    <thead>
      <tr>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">#</p>
        </th>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Element</p>
        </th>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Page URL</p>
        </th>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Feedback</p>
        </th>
        <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
          <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Date</p>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($feedbacks as $feedback)
      <tr>
        <td class="p-4 border-b border-blue-gray-50">
          {{ $feedback->id }}
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          <img src="{{ $feedback->screenshot }}" alt="Selected Element" style="max-width:200px; border:1px solid;" />
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          {{ $feedback->page_url }}
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          {{ $feedback->feedback }}
          </div>
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          {{ $feedback->created_at }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
