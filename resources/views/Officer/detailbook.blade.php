
@extends('Officer.main')
@section('content')


<br><br>
<!-- Breadcrumb -->
<nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50  max-w-[20%] mx-auto" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="/officer/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
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
          <a href="/officer/dashboard/bookpage" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Book</a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 ">Detail</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 ">{{$book->id}}</span>
        </div>
      </li>
    </ol>
  </nav>

<div class="mx-auto w-[70%] mt-11">
    <section class="flex items-center">
        <div class="w-[20%]">
          <a href="#" class="block border border-gray-200 rounded-lg overflow-hidden hover:border-gray-700 ">
            <img class="object-cover w-full h-96" src="{{ asset('storage/' . $book->thumbnail) }}" alt="">
          </a>
        </div>
      
        <a href="#" class="ml-16 h-full w-[80%] block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$book->title}}</h5>
          <p class="font-normal text-gray-700 ">{{$book->author}}
          </p>
          @if ($book->status == 'canqueued')
          <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full ">
            <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
            Available
        </span>
          @endif
          @if ($book->status == 'borrowed')     
          <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full ">
            <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
            Unavailable
        </span>
@endif
<p class="font-normal text-black ">Publisher :{{$book->publisher}}
</p>
<p class="font-normal text-black ">Date Publisher :{{$book->datepublished}}
</p>
@if ($book->category)
    <p class="font-normal text-black ">category :{{$book->category->category_name}}</p>
@else
    <p class="font-normal text-black ">category :-</p>
@endif

<br>
          <p class="font-normal text-gray-700 ">{{$book->description}}
          </p>
        </a>
      </section>
      
<br><br>
<a href="/officer/book/update/{{$book->id}}" type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center   me-2 mb-2">
Update
  </a>
  <a href="/officer/book/delete/{{$book->id}}" type="button" class="text-white bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center   me-2 mb-2">
   
    Delete
    </a>
</div>

@endsection