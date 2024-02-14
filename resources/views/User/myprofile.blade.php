@extends('User.main')
@section('content')

<section class=" dark:bg-gray-900">
    <div class="max-w-[100%] px-4 py-8 mx-auto lg:py-16">
        


        <main class="profile-page">
            <section class="pt-52 h-[100%]">
             
              <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                  <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
              </div>
            </section>
            <section class="relative py-16 bg-blueGray-200">
              <div class="container mx-auto px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                  <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                      <div class="w-full lg:w-4/12 px-4 lg:order-1">
                        <div class="flex justify-start pt-4 lg:pt-4">
                          <div class="mr-4 p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span class="text-sm text-blueGray-400">Friends</span>
                          </div>
                          <div class="mr-4 p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">Photos</span>
                          </div>
                          <div class="lg:mr-4 p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span class="text-sm text-blueGray-400">Comments</span>
                          </div>
                        </div>
                      </div>
                      <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                        
                        <img alt="..." src="{{ asset('storage/' . Auth()->user()->profilephoto) }}"  class="shadow-xl rounded-full w-[150px] h-[150px] align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                        <div class="relative">
                    </div>
                         
                      </div>
                      <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                        <div class="py-6 px-3  sm:mt-0">
                          <a href="/user/profile/setting/edit" class="bg-blue-500 active:bg-blue-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                            Edit
                          </a> 
                        </div>
                      </div>
                     
                    </div>
                    <div class="text-center mt-12">
                      <h3 class="text-4xl font-semibold leading-normal text-blueGray-700 mb-2">
                       {{Auth()->user()->fullname}}
                      </h3>
                      <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                        {{Auth()->user()->address}}
                      </div>
                      <div class=" text-blueGray-600">
                        <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>{{'@'.Auth()->user()->username}}
                      </div>
                      <div class="mb-2 text-blueGray-600">
                        <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>{{Auth()->user()->email}}
                      </div>
                    </div>
                    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                      <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-9/12 px-4">
                          <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti architecto sint dolore, sit odit minima animi optio voluptatum sequi et, unde cumque. Iusto dolorum praesentium odio recusandae. Impedit, possimus accusantium.
                          </p>
                          <a href="" class="font-normal text-pink-500">Learn More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </main>
    </div>
  </section>

  @endsection