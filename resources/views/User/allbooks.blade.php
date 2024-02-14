@extends('User.main')
@section('content')
<div class="mx-auto w-[90%]">
    <span>
     <form class="pt-2 relative mx-auto text-gray-600">
           <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
             type="search" name="search" 
             @if (isset($request))
                 placeholder="{{$request}}"
                 value="{{$request}}"
             @else
                 placeholder="search"
             @endif
             >
           <button type="submit" class="right-0 top-0 mt-7 px-3">
             <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
               xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
               viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
               width="512px" height="512px">
               <path
                 d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
             </svg>
           </button>
         </form></span>
</div>

<div class="grid grid-cols-3 w-[90%] mx-auto mt-11 gap-3">
    @foreach ($books as $b )
          <a href="/product/book/detail/{{$b->title}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{asset('storage/'.$b->thumbnail)}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$b->title}}</h5>
                    <p class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400">{{$b->excerpt}}</p>
                   <div class="flex item-center">
                    
                    <svg class="w-4 h-4 ms-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">{{number_format($b->comments->avg('rating'),1)}}</p>
        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
        <p class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white"> {{$b->comments->count()}} reviews</p>
    
                   </div>
                </div>
                
            </a>
    @endforeach
          
                                                           
          </div>
          <div class="mx-auto w-[90%] mt-10">
          {{$books->links()}}
          </div>
@endsection