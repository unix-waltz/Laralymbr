{{-- @dd() --}}

{{-- @extends('Admin.main')
@section('content')


<br><br>
<!-- Breadcrumb -->
<nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 max-w-[20%] mx-auto" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="/admin/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
          </svg>
          Dashboard
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <a href="/admin/dashboard/bookpage" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Book</a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Detail</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{$book->id}}</span>
        </div>
      </li>
    </ol>
  </nav>

<div class="mx-auto w-[70%] mt-11">
    <section class="flex items-center">
        <div class="w-[20%]">
          <a href="#" class="block border border-gray-200 rounded-lg overflow-hidden hover:border-gray-700 dark:border-gray-700">
            <img class="object-cover w-full h-96" src="{{ asset('storage/' . $book->thumbnail) }}" alt="">
          </a>
        </div>
      
        <a href="#" class="ml-16 h-full w-[80%] block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$book->title}}</h5>
          <p class="font-normal text-gray-700 dark:text-gray-400">{{$book->author}}
          </p>
          @if ($book->status == 'canqueued')
          <span class="bg-blue-100 pt-1  text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">You can Borrow this book</span>
          @endif
          @if ($book->status == 'borrowed')     
<span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Borrowed</span>
@endif
<p class="font-normal text-black dark:text-gray-400">Publisher :{{$book->publisher}}
</p>
<br>
          <p class="font-normal text-gray-700 dark:text-gray-400">{{$book->description}}
          </p>
        </a>
      </section>
      
<br><br>


<div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Work fast from anywhere</h5>
    <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Stay up to date and move work forward with Flowbite on iOS & Android. Download the app today.</p>
    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
           
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Have any problem?</div>
                <div class="-mt-1 font-sans text-sm font-semibold">Report</div>
            </div>
        </a>
        @if ($book->status == 'canqueued') 
        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
           
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Get in on</div>
                <div class="-mt-1 font-sans text-sm font-semibold">i want this Book</div>
            </div>
        </a>
        @endif
    </div>
</div>

</div>

@endsection --}}

@extends('Admin.main')
@section('content')


<br><br>
<!-- Breadcrumb -->
<nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 max-w-[20%] mx-auto" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="/admin/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
          </svg>
          Dashboard
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <a href="/admin/dashboard/bookpage" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Book</a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Detail</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{$book->id}}</span>
        </div>
      </li>
    </ol>
  </nav>

<div class="mx-auto w-[70%] mt-11">
    <section class="flex items-center">
        <div class="w-[20%]">
          <a href="#" class="block border border-gray-200 rounded-lg overflow-hidden hover:border-gray-700 dark:border-gray-700">
            <img class="object-cover w-full h-96" src="{{ asset('storage/' . $book->thumbnail) }}" alt="">
          </a>
        </div>
      
        <a href="#" class="ml-16 h-full w-[80%] block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$book->title}}</h5>
          <p class="font-normal text-gray-700 dark:text-gray-400">{{$book->author}}
          </p>
          @if ($book->status == 'canqueued')
          <span class="bg-blue-100 pt-1  text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"> can queued</span>
          @endif
          @if ($book->status == 'borrowed')     
<span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Borrowed</span>
@endif
<p class="font-normal text-black dark:text-gray-400">Publisher :{{$book->publisher}}
</p>
<p class="font-normal text-black dark:text-gray-400">Date Publisher :{{$book->datepublished}}
</p>
<p class="font-normal text-black dark:text-gray-400">category :{{$book->category->category_name}}
</p>
<br>
          <p class="font-normal text-gray-700 dark:text-gray-400">{{$book->description}}
          </p>
        </a>
      </section>
      
<br><br>


<div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Work fast from anywhere</h5>
    <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Stay up to date and move work forward with Flowbite on iOS & Android. Download the app today.</p>
    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
           
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Have any problem?</div>
                <div class="-mt-1 font-sans text-sm font-semibold">Report</div>
            </div>
        </a>
        @if ($book->status == 'canqueued') 
        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
           
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Get in on</div>
                <div class="-mt-1 font-sans text-sm font-semibold">i want this Book</div>
            </div>
        </a>
        @endif
    </div>
</div>

</div>

@endsection