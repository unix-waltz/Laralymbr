
@extends('User.main')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<style>
  .rating-box {
  position: relative;
}

.rating-box .stars {
  display: flex;
  align-items: center;
  gap: 1px;
}
.stars i {
  color: #e6e6e6;
  font-size: 17px;
  cursor: pointer;
  transition: color 0.2s ease;
}
.stars i.active {
  color: #ff9c1a;
}
</style>
<br><br>
<!-- Breadcrumb -->
<nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50  sm:max-w-[23%] w-[80%] mx-auto" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
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
          <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 ">Book</a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Detail</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 ">{{$title->page}}&nbsp; </span>
        </div>
      </li>
    </ol>
  </nav>

<div class="mx-auto w-[70%] mt-11">
    <section class="md:flex md:items-center pb-3">
        <div class="2xl:w-[20%] md:w-1/2 pb-4 2xl:pb-0">
          <a href="#" class="block border border-gray-200 rounded-lg overflow-hidden hover:border-gray-700 ">
            <img class="object-cover w-full sm:h-full" src="{{asset('storage/'.$title->thumbnail)}}" alt="">
          </a>
        </div>
      
        <div href="#" class="mx-auto md:ml-3 h-full md:w-[80%] block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$title->title}}</h5>
          @if ($title->status == 'canqueued')
          <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full ">
            <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
            ( Available ) You Returned This Book
        </span>
          @endif
          @if ($title->status == 'borrowed')     
          <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
            <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
            @if ($status == 'OK')
            You Borrowed this Book
              @else
              Unavailable
            @endif
        </span>
        @endif
        <span class="normal hover:italic hover:text-sky-600 text-gray-500"># <a href="/user/category/{{$title->category->category_name}}"> {{$title->category->category_name}}</a></span>
          <br> <a href="/user/book/author/{{$title->author}}" class="text-sky-600 hover:italic" >{{$title->author}}</a>
          <br><a href="/user/book/publisher/{{$title->publisher}}" class="text-black text-sm" >Publisher :  <span class="normal hover:italic text-gray-500">{{$title->publisher}}</span> </a>
           <p class="text-black text-sm" >Date Published :  <span class="normal hover:italic text-gray-500">{{$title->datepublished}}</span> </p>
<br>
          <p class="font-normal text-gray-700 ">{{$title->description}}
          </p>
        </div>
      </section>
<form action="/user/collection" method="post" class="inline mt-11">
  @csrf
  @method('POST')
  <input type="hidden" name="bookid" value="{{$title->id}}">
  <input type="hidden" name="userid" value="{{Auth()->user()->id}}">
@if (isset($collection->userid) == Auth()->user()->id)
<button>
  <input type="hidden" name="data" value="DEL">
  <input type="hidden" name="collid" value="{{$collection->id}}">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline align-middle">
  <path stroke-linecap="round" stroke-linejoin="round" d="m3 3 1.664 1.664M21 21l-1.5-1.5m-5.485-1.242L12 17.25 4.5 21V8.742m.164-4.078a2.15 2.15 0 0 1 1.743-1.342 48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185V19.5M4.664 4.664 19.5 19.5" />
</svg>
</button>
  @else
   <button>
    <input type="hidden" name="data" value="NEW">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline align-middle">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
</svg>
</button>
@endif
<span class="inline text-sm text-gray-700">
  @if (isset($savedpost) )
 {{$savedpost->count()}}
  @else
  0
  @endif
  user saved this book</span>
</form>
<br>
<br>


<div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 ">
  <h5 class="mb-2 text-3xl font-bold text-gray-900 ">By reading, we open up the world</h5>
  <p class="mb-5 text-base text-gray-500 sm:text-lg ">kids, parents or even students?
      quality and legal books for everyone.</p>
  <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
      <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 ">
         
          <div class="text-left rtl:text-right">
              <div class="mb-1 text-xs">Have any problem?</div>
              <div class="-mt-1 font-sans text-sm font-semibold">Report</div>
          </div>
      </a>
         @if ($title->status == 'borrowed')
         <form action="/user/return" method="post" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 ">
        @csrf
        @method('POST')
        <input type="hidden" name='book_id' value={{$title->id}}>
         <input type="hidden" name='user_id' value={{Auth()->user()->id}}>
          <button type="submit" class="text-left rtl:text-right">
              <div class="mb-1 text-xs">finished reading?</div>
              <div class="-mt-1 font-sans text-sm font-semibold">I want to return this book</div>
          </button>
        
      </form> 
       @endif
  </div>
</div>

</div>



{{-- comment section --}}
<div class="w-full overflow-hidden">
  <section class="bg-white  py-8 lg:py-16 antialiased">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">Comments ({{$title->comments->count()}}) <span class="text-base text-gray-500">{{number_format($title->comments->avg('rating'),1)}}  <svg class="w-4 h-4 text-yellow-300 ms-1 inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg></span></h2>
          
      </div>
      @if ($title->status == 'borrowed')
    @if ($status == "OK")
      
      <form class="mb-6" method="post" action="/user/comment" >
        @method('POST')
        @csrf
        <input type="hidden" name="bookid" value="{{$title->id}}"> 
        <input type="hidden" name="userid" value="{{Auth()->user()->id}}">
        <div class="ml-2 mb-3 rating-box">
    
          <div class="stars">
            <i class="fa-solid fa-star"><input type="radio" class="opacity-0 relative right-4" name="rating" value="1"> </i>
            <i class="fa-solid fa-star"><input type="radio" class="opacity-0 relative right-4" name="rating" value="2"> </i>
            <i class="fa-solid fa-star"><input type="radio" class="opacity-0 relative right-4" name="rating" value="3"> </i>
            <i class="fa-solid fa-star"><input type="radio" class="opacity-0 relative right-4" name="rating" value="4"> </i>
            <i class="fa-solid fa-star"><input type="radio" class="opacity-0 relative right-4" name="rating" value="5"> </i>
          </div>
        </div>
        <script>
          const stars = document.querySelectorAll(".stars i");
        stars.forEach((star, index1) => {
          star.addEventListener("click", () => {
            stars.forEach((star, index2) => {
              index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
            });
          });
        });
        </script>
          <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
              <label for="comment" class="sr-only">Your comment</label>
              <textarea id="comment" rows="6" name='review'
                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
                  placeholder="Write a comment..." required></textarea>
          </div>
          <button type="submit"
              class="inline-flex items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
              Post comment
          </button>
      </form>
      @endif
  @endif
      @foreach ($title->comments->reverse() as $c )
      
    <article class="p-6 text-base bg-white rounded-lg d">
      
          <footer class="flex justify-between items-center mb-2">
              <div class="flex items-center">
                  <p class="inline-flex items-center mr-3 text-sm text-gray-900 "><img
                          class="mr-2 w-6 h-6 rounded-full"
                          src="{{ asset('storage/' . $c->userComents->profilephoto) }}"
                          alt="Michael Gough">{{$c->userComents->fullname}}
                          <span class="sm:text-sm text-xs text-gray-500">
                            @if ($c->userid == Auth()->user()->id)
                              &nbsp; {{'( You )'}}
                            @endif
                          </span>
                        </p>
                  <p class="text-xs  hover:italic text-gray-600 ">{{$c->commented_at}}</p>
              </div>
              <button id="dropdownComment{{$c->id}}Button" data-dropdown-toggle="dropdownComment{{$c->id}}"
                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 d bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 "
                type="button">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                </svg>
                <span class="sr-only">Comment settings</span>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownComment{{$c->id}}"
                class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow ">
                  <ul class="py-1 text-sm text-gray-700 d"
                      aria-labelledby="dropdownMenuIconHorizontalButton">
                      @if ($c->userid == Auth()->user()->id)
                       <li>
                        <a href="/user/comment/delete/{{$c->id}}"
                            class="block py-2 px-4 hover:bg-gray-100 ">Delete</a>
                    </li>
                      @else
                        <li>
                          <a href="#"
                              class="block py-2 px-4 hover:bg-gray-100 ">Report</a>
                      </li>
                      @endif
                  </ul>
              </div>
          </footer>
  <div class="flex items-center">
  
  <svg class="w-4 h-4  {{$c->rating >= 1 ? 'text-yellow-300' : 'text-gray-300' }} ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
    <svg class="w-4 h-4  {{$c->rating >= 2 ? 'text-yellow-300' : 'text-gray-300' }}  ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
    <svg class="w-4 h-4  {{$c->rating >= 3 ? 'text-yellow-300' : 'text-gray-300' }}  ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
    <svg class="w-4 h-4  {{$c->rating >= 4 ? 'text-yellow-300' : 'text-gray-300' }}  ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
    <svg class="w-4 h-4 ms-1  {{$c->rating >= 5 ? 'text-yellow-300' : 'text-gray-300' }}  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>
  </div>
  
          <p class="text-gray-500 ">{{$c->review}}</p>
          <div class="flex items-center mt-4 space-x-4">
              <button type="button"
                  class="flex items-center text-sm text-gray-500 hover:underline  font-medium">
                  <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                  </svg>
                  Reply
              </button>
          </div>
      </article>
  @endforeach
    </div>
  </section>
</div>

@endsection

