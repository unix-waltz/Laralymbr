@extends('Admin.main')
@section('content')

    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-[50%] px-4 py-8 mx-auto lg:py-16">
            

<div class="w-[100%] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-end px-4 pt-4">
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2" aria-labelledby="dropdownButton">
            <li>
                <a href="/admin/dashboard/setting/edit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
            </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col items-center pb-10">
        <img class="rounded w-36 h-36" src="{{ asset('storage/' . Auth()->user()->profilephoto) }}" alt="Extra large avatar">
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{Auth()->user()->fullname}}</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{'@'.Auth()->user()->username}}</span>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{Auth()->user()->email}}</span>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{Auth()->user()->address}}</h5>
       
    </div>
</div>

        </div>
      </section>

@endsection