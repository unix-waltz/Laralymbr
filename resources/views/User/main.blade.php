<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="">
    


    <nav class="bg-white border-gray-200  w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://unix-waltz.github.io" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap ">Laralymbr</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">  <span class="hidden sm:block text-sm text-gray-900 ">{{auth()->user()->fullname}}</span> &nbsp;&nbsp;&nbsp;
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 d" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . Auth()->user()->profilephoto) }}" alt="user photo">
            </button>
          
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow " id="user-dropdown">
              <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 ">{{auth()->user()->email}}</span>
                <span class="block text-sm  text-gray-500 truncate ">{{'@'.auth()->user()->username}}
                
                </span>
              </div>
              <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                  <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Home</a>
                </li>
                <li>
                  <a href="/myprofile/{{'@'.Auth()->user()->username}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                </li>
                <li>
                  <a href="/mybooks/{{'@'.Auth()->user()->username}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Books</a>
                </li>
                <li>
                  <li>
                    <a href="/user/myhistory/{{'@'.Auth()->user()->username}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My History</a>
                  </li>
                  <li>
                  <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                </li>
              </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200  " aria-controls="navbar-user" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>
        </div>
        
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white d ">
            <li>
              <a href="/" class="{{$active == 'home' ? 'block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 ' : 'block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0  '}}" aria-current="page">Home</a>
            </li>
            <li>
              <a href="/about" class="{{$active == 'about' ? 'block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 ' : 'block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0  '}}" >About</a>
            </li>
           
            <li>
              <a href="/contact" class="{{$active == 'contact' ? 'block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 ' : 'block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0  '}}" >Contact</a>
            </li>
            <li>
              <a href="/all-books" class="{{$active == 'book' ? 'block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 ' : 'block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0  '}}" >All Books</a>
            </li>
          </ul>
        </div>
        </div>
        

      </nav>


@yield('content')


<br><br><br>
<footer class="bg-white rounded-lg shadow m-4  ">
  <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
    <span class="text-sm text-gray-500 sm:text-center ">© 2024 <a href="https://unix-waltz.github.io" class="hover:underline">Unix-Waltz™</a>. All Rights Reserved.
  </span>
  <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500  sm:mt-0">
      <li>
          <a href="#" class="hover:underline me-4 md:me-6">About</a>
      </li>
      <li>
          <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
      </li>
      <li>
          <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
      </li>
      <li>
          <a href="#" class="hover:underline">Contact</a>
      </li>
  </ul>
  </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
</body>
</html>