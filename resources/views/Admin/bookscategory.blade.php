@extends('Admin.main')
@section('content')
<br><br>
<nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50  max-w-[20%] mx-auto" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="/admin/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
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
          <a href="/admin/dashboard/bookpage" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 ">Book</a>
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
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 ">{{$data->category_name}}</span>
        </div>
      </li>
    </ol>
  </nav>
 <div class="mx-10">
  <a href="/admin/category/update/{{$data->id}}" type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  me-2 mb-2">
    Update
      </a>
      <a href="/admin/category/delete/{{$data->id}}" type="button" class="text-white bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  me-2 mb-2">
        Delete
        </a>
 </div>
<section class="p-6 sm:p-10 space-y-6">
<h1 class="text-4xl font-semibold mb-2">{{$data->category_name}}</h1>
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:w-[85%] w-[95%] mx-auto mt-11 gap-3">
@foreach ($data->books as $b)
  

      <a href="/admin/book/detail/{{$b->id}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 ">
          <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('storage/' . $b->thumbnail) }}" alt="">
          <div class="flex flex-col justify-between p-4 leading-normal">
              <h5 class="mb-2 2xl:text-2xl text-base font-bold tracking-tight text-gray-900">{{$b->title}}</h5>
              <p class="mb-3 font-normal text-sm text-gray-700 ">{{$b->excerpt}}</p>
          </div>
      </a>
      @endforeach
                                                        
    </div>
  </section>

@endsection