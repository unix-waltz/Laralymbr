@extends('User.main')
@section('content')


<br><br>
<!-- Breadcrumb -->
<nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 max-w-[23%] mx-auto" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
          </svg>
          Home
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Book</a>
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
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{$title->page}}&nbsp; </span>
        </div>
      </li>
    </ol>
  </nav>

<div class="mx-auto w-[70%] mt-11">
    <section class="flex items-center">
        <div class="w-[20%]">
          <a href="#" class="block border border-gray-200 rounded-lg overflow-hidden hover:border-gray-700 dark:border-gray-700">
            <img class="object-cover w-full h-96" src="{{asset('storage/'.$title->thumbnail)}}" alt="">
          </a>
        </div>
      
        <div href="#" class="ml-16 h-full w-[80%] block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$title->title}}</h5>
          @if ($title->status == 'borrowed')
          <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
            <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
            You Borrowed This Book
        </span>
          @endif
          @if ($title->status == 'canqueued')     
          <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
            <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
            Unavailable
        </span>
        @endif
        <span class="normal hover:italic hover:text-sky-600 text-gray-500"># <a href="/user/category/{{$title->category->category_name}}"> {{$title->category->category_name}}</a></span>
           <p class="text-sky-600" >{{$title->author}}</p>
           <p class="text-black text-sm" >Publisher :  <span class="normal hover:italic text-gray-500">{{$title->publisher}}</span> </p>
           <p class="text-black text-sm" >Date Published :  <span class="normal hover:italic text-gray-500">{{$title->datepublished}}</span> </p>

         
<br>
          <p class="font-normal text-gray-700 dark:text-gray-400">{{$title->description}}
          </p>
   
        </div>
      </section>
      
<br><br>


<div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">By reading, we open up the world</h5>
    <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">kids, parents or even students?
        quality and legal books for everyone.</p>
    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
           
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Have any problem?</div>
                <div class="-mt-1 font-sans text-sm font-semibold">Report</div>
            </div>
        </a>
        <form action="/user/borrow" method="post" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
          @csrf
          @method('POST')
          <input type="hidden" name='book_id' value={{$title->id}}>
           <input type="hidden" name='user_id' value={{Auth()->user()->id}}>
            <button type="submit" class="text-left rtl:text-right">
                <div class="mb-1 text-xs">finished reading?</div>
                <div class="-mt-1 font-sans text-sm font-semibold">I want to return this book</div>
            </button>
        </form>
    </div>
</div>

</div>

@endsection