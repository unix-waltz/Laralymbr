@extends('Officer.main')
@section('content')
<main class="p-6 sm:p-10 space-y-6">
  <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
    <div class="mr-6">
      <h1 class="text-4xl font-semibold mb-2">Dashboard</h1>
      <h2 class="text-gray-600 ml-0.5"></h2>
    </div>
    @if ($errors->any())
    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Failed !</span>
        <div>
          <span class="font-medium">Failed !Make sure you input Falid data:</span>
            <ul class="mt-1.5 list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach    
            </ul>
        </div>
    </div>

       @endif
    <div class="flex flex-wrap items-start justify-end -mb-3">
      
      <a href="/officer/dashboard/book/new" class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 rounded-md ml-6 mb-3">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
      New Book
      </a>
    </div>
  </div>
  <section class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
    <div class="flex items-center p-8 bg-white shadow rounded-lg">
      <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
      </div>
      <div>
        <span class="block text-2xl font-bold">{{$totalbooks}}</span>
        <span class="block text-gray-500">Total Book</span>
      </div>
    </div>
    <div class="flex items-center p-8 bg-white shadow rounded-lg">
      <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
        </svg>
      </div>
      <div>
        <span class="block text-2xl font-bold">{{$canqueuedbooks}}</span>
        <span class="block text-gray-500">books that can be borrowed</span>
      </div>
    </div>
    <div class="flex items-center p-8 bg-white shadow rounded-lg">
      <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
        </svg>
      </div>
      <div>
        <span class="inline-block text-2xl font-bold">{{$borrowedbooks}}</span>
        <span class="inline-block text-xl text-gray-500 font-semibold"></span>
        <span class="block text-gray-500">books borrowed</span>
      </div>
    </div>
   
  </section>

<button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
  + Category
</button>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <form action="/officer/book/category/new" method="post">
    @csrf
    @method('POST')
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
          
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900 ">
                   Category
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cancel</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="m-5">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 "> New Category</label>
              <input type="text" name="category_name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="..." required>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10  ">Decline</button>
            </div>
        </div>
    </div>
  </form>
</div>



  <div class="row-span-3 bg-white shadow rounded-lg">
      <div class="flex items-center justify-between px-6 py-5 font-semibold border-b border-gray-100">
        <span>All Categories</span>
        <button type="button" class="inline-flex justify-center rounded-md px-1 -mr-1 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-600" id="options-menu" aria-haspopup="true" aria-expanded="true">
          Category
          <svg class="-mr-1 ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
       
        </button>
        <!-- Refer here for full dropdown menu code: https://tailwindui.com/components/application-ui/elements/dropdowns -->
      </div>
      <div class="overflow-y-auto" style="max-height: 24rem;">
        <ul class="p-6 space-y-6">
          @foreach ($category as $c )
            <li class="flex items-center">
       <h1>#</h1>
            <a href="/officer/book/category/{{$c->category_name}}" class="text-gray-600">{{$c->category_name}}</a>
            <span class="ml-auto font-semibold">
            
                {{ $c->books->count() }}
           
            </span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
      <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
        <div class="px-6 py-5 font-semibold border-b border-gray-100">New Books has borrowed.</div>
  
        <div class="overflow-y-auto" style="max-height: 24rem;">
          <ul class="p-6 space-y-6">
            @foreach ($_books_borrowed as $c )
              <li class="flex items-center">
         <h1>-</h1>
              <a href="/officer/book/detail/{{$c->book->id}}" class="text-gray-600 font-semibold">{{$c->book->title}}<span style="" class="font-normal">&nbsp;by {{$c->user->username}}</span></a>
              <span class="ml-auto font-semibold">
              
                {{$c->created_at->diffForHumans()}}
             
              </span>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
        <div class="px-6 py-5 font-semibold border-b border-gray-100">New Books has returned.</div>
  
        <div class="overflow-y-auto" style="max-height: 24rem;">
          <ul class="p-6 space-y-6">
            @foreach ($_books_returned as $c )
            <li class="flex items-center">
       <h1>-</h1>
            <a href="/officer/book/detail/{{$c->book->id}}" class="text-gray-600 font-semibold">{{$c->book->title}}<span style="" class="font-normal">&nbsp;by {{$c->user->username}}</span></a>
            <span class="ml-auto font-semibold">
            
              {{$c->created_at->diffForHumans()}}
           
            </span>
          </li>
          @endforeach
          </ul>
        </div>
      </div>
  
    </section>
    <section class="">
      <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 mx-auto mt-11 gap-3 ">
        @foreach ($books as $b )
        
              <a href="/officer/book/detail/{{$b->id}}" class=" flex flex-col items-center bg-white border overflow-hidden border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 ">
                    <img class=" object-cover w-full rounded-t-lg  md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{asset('storage/'.$b->thumbnail)}}" alt="">
                    <div class="flex flex-col  justify-between p-4 leading-normal">
                        <h5 class="mb-2 sm:text-2xl text-base font-bold tracking-tight text-gray-900">{{$b->title}}</h5>
                        <p class="mb-3 font-normal hidden sm:block text-xs text-gray-700  ">{{$b->excerpt}}</p>
                       <div class="flex item-center">
                        
                        <svg class="w-4 h-4 ms-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <p class="ms-2 sm:text-sm text-xs font-bold text-gray-900">{{number_format($b->comments->avg('rating'),1)}}</p>
            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full "></span>
            <p class="text-xs sm:text-sm font-medium text-gray-900 underline hover:no-underline"> {{$b->comments->count()}} reviews</p>
        
                       </div>
                    </div>
                    
                </a>
        @endforeach
              </div>
    </section>
</main>
@endsection