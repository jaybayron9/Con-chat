<?php view('partials/header') ?>   

<div class="flex justify-center items-center">
    <div class="grid grid-cols-6 gap-10 w-full md:m-5"> 
        <div id="aside" class="z-20 bg-bg col-span-6 md:col-span-2 shadow-out md:rounded-lg md:h-contact h-full fixed md:relative -left-full md:left-0 delay-100 duration-300 ease-out">
            <div class="m-5 flex flex-col gap-5 relative">
                <button id="close-bar" class="absolute grid grid-rows-2 right-0 z-10 md:hidden">  
                    <div class="h-[2px] w-6 bg-black transform -rotate-45"></div>
                    <div class="h-[2px] w-6 bg-black transform rotate-45"></div> 
                </button>
                <h1 class="text-center font-poppins font-extra-bold text-text text-3xl">
                    Contacts
                </h1> 
                <input type="search" id="search-bar" placeholder="Search" class="self-center shadow-in rounded-full text-center p-2 focus:outline-none focus:shadow-in-after w-full placeholder:font-md bg-gray-200 placeholder:font-poppins"> 
                <ul class="flex flex-col gap-y-3 overflow-y-auto h-contact-list scroll-pl-6 p-1">
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                    <li class="w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none"> 
                        <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                        <div class="mt-auto -ml-3 mb-2">
                            <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div> 
                        </div>
                        <div class="px-2 py-1 flex flex-col w-full">
                            <h3 class="font-poppins select-none">User One</h3>
                            <div class="relative w-full -mt-1">
                                <p class="text-sm font-light select-none whitespace-nowrap text-ellipsis overflow-hidden w-insight-text">
                                    Message here
                                </p>
                                <div class="text-[10px] ml-auto mt-auto select-none whitespace-nowrap">
                                    05:00 PM | 9/7/23
                                </div>
                            </div>
                        </div>
                    </li>  
                </ul>
            </div>  
            <div class="flex gap-x-2 absolute bottom-0 mb-4">
                <button type="button" class="select-none ml-5 shadow-out py-1 px-3 font-poppins active:shadow-in-after text-gray-800 rounded-full mt-auto">
                    Logout
                </button>  
                <button class="select-none shadow-out py-1 px-3 font-poppins active:shadow-in-after text-gray-800 rounded-full mt-auto">
                    Settings
                </button>
            </div>
        </div>
        <div class="col-span-6 md:col-span-4 shadow-out relative">
            <button id="show-bar" class="absolute flex flex-col gap-y-1 md:hidden m-5 right-0">
                <div class="h-[2px] w-4 bg-black"></div>
                <div class="h-[2px] w-4 bg-black"></div>
                <div class="h-[2px] w-4 bg-black"></div>
            </button> 
        </div> 
    </div>
</div>

<?php view('partials/footer') ?>  

<script>
    $('#show-bar').click(() => {  
        $('#aside').removeClass('-left-full').addClass('w-full');
    })
    $('#close-bar').click(() => {
        $('#aside').removeClass('w-full').addClass('-left-full');
    })
</script>