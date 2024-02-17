@extends('User.main')
@section('content')

<div class="2xl:container 2xl:mx-auto lg:py-16 lg:px-20 md:py-12 md:px-6 py-9 px-4">
    <div class="flex flex-col lg:flex-row justify-between gap-8">
        <div class="w-full lg:w-5/12 flex flex-col justify-center">
            <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-gray-800 dark:text-white pb-4">About Us</h1>
            <p class="font-normal text-base leading-6 text-gray-600 dark:text-white">
                <span>Welcome to our Laralymbr!</span><br>

                It is a long-established commitment that users will be engaged by the rich content of our Laralymbr when exploring its layout. Our dedication to providing a seamless digital reading experience is evident in the services we offer.

                At our Laralymbr, we are on a mission to make knowledge accessible to everyone. Our commitment is solidified through the establishment of a digital space that is free, ensuring the rights and liberties of users are preserved. We are dedicated to upholding these principles, creating a platform where the literary world can be explored and enjoyed by all.</div>
        <div class="w-full lg:w-8/12">
            <img class="w-full h-full rounded-lg" src="https://c4.wallpaperflare.com/wallpaper/897/1005/115/library-artwork-books-wallpaper-preview.jpg" alt="A group of People" />
        </div>
    </div>

    <div class="flex lg:flex-row flex-col justify-between gap-8 pt-12">
        <div class="w-full lg:w-5/12 flex flex-col justify-center">
            <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-gray-800 dark:text-white pb-4">Our Story</h1>
            <p class="font-normal text-base leading-6 text-gray-600 dark:text-white">Our journey began with a vision to transform traditional libraries into the digital age. Embracing technology, we have created a space where readers can access an extensive collection of digital resources at their fingertips. Our commitment to preserving knowledge is akin to the historic charter, ensuring the freedom of access and the integrity of information.</p>
        </div>
        <div class="w-full lg:w-8/12 lg:pt-8">
            <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-4 shadow-lg rounded-md">
                <div class="p-4 pb-6 flex justify-center flex-col items-center">
                    <img class="md:block hidden rounded-lg" src="data:image/jpeg;base64,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" alt="Alexa featured Image" />
                    <img class="md:hidden block rounded-lg" src="data:image/jpeg;base64,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" alt="Alexa featured Image" />
                    <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">ChatGPT</p><span class="hover:italic text-sm text-gray-600">( Back-End & Software Developer )</span>
                </div>
                <div class="p-4 pb-6 flex justify-center flex-col items-center">
                    <img class="md:block hidden rounded-lg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/2048px-Google_%22G%22_logo.svg.png" alt="Olivia featured Image" />
                    <img class="md:hidden block rounded-lg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/2048px-Google_%22G%22_logo.svg.png" alt="Olivia featured Image" />
                    <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Google</p><span class="hover:italic text-sm text-gray-600">( Technical Lead ~ Software Manager & FE)</span>
                </div>
                <div class="p-4 pb-6 flex justify-center flex-col items-center">
                    <img class="md:block hidden rounded-lg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/YouTube_social_red_square_%282017%29.svg/2048px-YouTube_social_red_square_%282017%29.svg.png" alt="Liam featued Image" />
                    <img class="md:hidden block rounded-lg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/YouTube_social_red_square_%282017%29.svg/2048px-YouTube_social_red_square_%282017%29.svg.png" alt="Liam featued Image" />
                    <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Youtube</p><span class="hover:italic text-sm text-gray-600">( Software Helper )</span>
                </div>
                <div class="p-4 pb-6 flex justify-center flex-col items-center">
                    <img class="md:block hidden rounded-lg" src="{{asset('assets/img/1694946697581.jpeg')}}" alt="Elijah featured image" />
                    <img class="md:hidden block rounded-lg" src="{{asset('assets/img/1694946697581.jpeg')}}" alt="Elijah featured image" />
                    <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Putra Pratama</p><span class="hover:italic text-sm text-gray-600">( Profesional CopyPaster )</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection