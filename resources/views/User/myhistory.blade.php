@extends('User.main')
@section('content')
<div class="w-[90%] mx-auto">
    <br>
    <h1 class="text-3xl font-bold">My History</h1>
    <br><br>
<ol class="relative border-s border-gray-200 "> 
    @foreach ($data->reverse() as $d )
             
    <li class="mb-10 ms-4">
        @if ($d->status == 'borrowed')
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">Borrowed at {{$d->borrowed_at}}</time>
        <h3 class="text-lg font-semibold text-gray-900 ">You borrowed the book  {{$d->book->title}} by&nbsp;{{$d->book->author}}</h3>
        <p class="mb-4 text-base font-normal text-gray-500 d">You have borrowed a book with the title "{{$d->book->title}}" written by {{$d->book->author}}. This book was published by {{$d->book->published}} on "{{$d->book->datepublished}}" date.Currently, the status of this book is "{{$d->book->status}}". This book belongs to the category with {{$d->book->category->category_name}}.  This book was first added on {{\Carbon\Carbon::parse($d->created_at)->format(' d F Y ') }} and last updated on {{\Carbon\Carbon::parse($d->updated_at)->format(' d F Y ') }}.</p>
        <a href="/mybook/detail/{{$d->book->title}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 ">Detail <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
  </svg></a> 
  @else
  <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white"></div>
  <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">returned at {{$d->returned_at}}</time>
  <time class="mb-1 text-sm font-normal block leading-none text-gray-400 ">- {{$d->borrowed_at}}</time>
  <h3 class="text-lg font-semibold text-gray-900 ">You Returned the book  {{$d->book->title}} by&nbsp;{{$d->book->author}}</h3>
  <p class="mb-4 text-base font-normal text-gray-500 ">You have returned a book with the title "{{$d->book->title}}" written by {{$d->book->author}}. This book was published by {{$d->book->published}} on "{{$d->book->datepublished}}" date.Currently, the status of this book is "{{$d->book->status}}". This book belongs to the category with {{$d->book->category->category_name}}. Here is the link of book: <span><a href="/product/book/detail/{{$d->book->title}}" class="hover:italic text-base text-blue-500 " href="">click here</a></span>. This book was first added on {{\Carbon\Carbon::parse($d->created_at)->format(' d F Y ') }} and last updated on {{\Carbon\Carbon::parse($d->updated_at)->format(' d F Y ') }}.</p>
               
  @endif
    </li>        
    @endforeach 
</ol>


</div> 

@endsection