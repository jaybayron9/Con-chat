<?php view('partials/header') ?>

<div class="flex justify-center items-center">
    <div class="grid grid-cols-6 gap-5 w-full md:m-5">
        <div id="aside" class="z-20 bg-bg col-span-6 md:col-span-2 shadow-out md:rounded-lg md:h-contact h-full fixed md:relative -left-full md:left-0 delay-100 duration-300 ease-out">
            <div class="m-5 flex flex-col gap-5 relative">
                <div class="absolute right-0 -mt-3 -mr-2 z-10 md:hidden ">
                    <button id="close-bar" class="font-poppins text-red-500 shadow-out px-3 rounded-xl active:shadow-in-after">
                        Close
                    </button>
                </div>
                <h1 class="text-center font-poppins font-extra-bold text-text text-3xl">
                    Contacts
                </h1>
                <input type="search" id="search-bar" placeholder="Search" class="search self-center shadow-in rounded-full text-center p-2 focus:outline-none focus:shadow-in-after w-full placeholder:font-md bg-gray-200 placeholder:font-poppins">
                <ul class="contacts-ul flex flex-col gap-y-3 overflow-y-auto md:h-contact-list h-contact-list-ph scroll-pl-6 p-1">
                    <?php foreach ($contacts as $contact) : ?>
                        <li onclick="window.location.href = '/chat?to=<?= $contact['id'] ?>'" class="contacts-li w-full shadow-out rounded-full inline-flex hover:shadow-in-after active:shadow-in hover:cursor-pointer select-none">
                            <img src="static/img.jpg" alt="profile image" class="select-none h-16 w-16 min-h-contact-image min-w-contact-image rounded-full">
                            <div class="mt-auto -ml-3 mb-2">
                                <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div>
                            </div>
                            <div class="px-2 py-1 flex flex-col w-full">
                                <h3 class="font-poppins select-none"><?= $contact['name'] ?></h3>
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
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="flex gap-x-2 absolute bottom-0 mb-4 w-full">
                <button type="button" onclick="window.location.href = '/logout'" class="select-none ml-5 shadow-out py-1 px-3 font-poppins active:shadow-in-after text-gray-800 rounded-full mt-auto  bg-bg">
                    Logout
                </button>
                <button class="select-none shadow-out py-1 px-3 font-poppins active:shadow-in-after text-gray-800 rounded-full mt-auto  bg-bg">
                    Settings
                </button>
            </div>
        </div>
        <div class="col-span-6 md:col-span-4 shadow-out md:rounded-lg h-full fixed md:relative w-full">
            <button id="show-bar" class="absolute flex flex-col gap-y-1 md:hidden mr-3 mt-2 right-0 font-poppins text-blue-500 shadow-out px-3 rounded-xl active:shadow-in-after">
                Contacts
            </button>
            <div class="flex flex-col h-full">
                <div class="md:mt-2 mt-11 py-2 mx-2 flex flex-row px-2 shadow-out rounded-2xl">
                    <img id="head-image" src="static/img.jpg" alt="profile image" class="select-none ml-1 h-14 w-14 min-h-head-image min-w-head-image rounded-full ">
                    <div class="mt-auto -ml-3 mb-2">
                        <div class="h-3 w-3 bg-green-500 rounded-full border border-gray-800"></div>
                    </div>
                    <div class="flex ml-3 items-center">
                        <h3 id="head-name" class="font-poppins"></h3>
                    </div>
                    <div type="button" class="inline-flex ml-auto items-center font-poppins font-extrabold text-gray-600">
                        <button type="button" title="Video call" class="p-2 mr-2 rounded-full shadow-out active:shadow-in">
                            VC
                        </button>
                    </div>
                </div>
                <div id="convo" class="flex flex-col gap-y-3 shadow-in m-2 overflow-y-auto h-chat-box p-2 bg-gray-100 rounded-xl">
                    <?php foreach ($messages as $message) : ?>
                        <?php if ($message['from_user_id'] !== $_SESSION['user_id']) : ?>
                            <div class="flex gap-2">
                                <img src="/static/img.jpg" alt="" class="select-none ml-1 h-8 w-8 min-h-chat-profile min-w-chat-profile rounded-full mt-auto shadow-xl">
                                <div class="bg-gray-700 text-white p-2 rounded-xl shadow-md flex flex-col mr-20">
                                    <p class="text-[15px] mb-2">
                                        <?= $message['message'] ?>
                                    </p>
                                    <?php 
                                    if ($message['file'] !== ''): 
                                        $files = explode('~', $message['file']);
                                        $filterFile = array_filter($files);  
                                    ?>
                                        <div class="grid <?= count($filterFile) == 1 ? 'md:grid-cols-1 grid-cols-1' : ' md:grid-cols-3 grid-cols-2' ?> gap-2"> 
                                        <?php foreach($filterFile as $file):  ?>
                                            <img src="<?= $file ?>" alt="Image" class="h-40 w-40 rounded-md shadowm-md border border-gray-600"> 
                                        <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <span class="text-[11px] ml-auto">
                                        <?= msgTime($message['created_at']) ?>
                                    </span>
                                </div>
                            </div>
                        <?php else : ?> 
                            <div class="flex gap-2 ml-auto">
                                <div class="bg-blue-600 text-white p-2 rounded-xl shadow-md flex flex-col ml-20">
                                    <p class="text-[15px] mb-2">
                                        <?= $message['message'] ?>
                                    </p>
                                    <?php 
                                    if ($message['file'] !== ''): 
                                        $files = explode('~', $message['file']);
                                        $filterFile = array_filter($files);  
                                    ?>
                                        <div class="grid <?= count($filterFile) == 1 ? 'md:grid-cols-1 grid-cols-1' : ' md:grid-cols-3 grid-cols-2' ?> gap-2"> 
                                        <?php foreach($filterFile as $file):  ?>
                                            <img src="<?= $file ?>" alt="Image" class="h-40 w-40 rounded-md shadowm-md border border-gray-600"> 
                                        <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <span class="text-[11px]">
                                        <?= msgTime($message['created_at']) ?>
                                    </span>
                                </div>
                                <img src="/static/img.jpg" alt="" class="select-none ml-1 h-8 w-8 min-h-chat-profile min-w-chat-profile rounded-full mt-auto shadow-xl">
                            </div> 
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <form id="send-form"  class="flex items-center gap-x-4 mx-2 px-2">
                    <input type="hidden" name="from_user" id="from_user" value="<?= $_SESSION['user_id'] ?>">
                    <input type="hidden" name="to_user" id="to_user" value="<?= $_GET['to'] ?? $_SESSION['user_id'] ?>">
                    <div> 
                        <button type="button" id="files-btn" class="rotate-45 transform rounded-full shadow-out active:shadow-in p-2">📎</button>
                        <input type="file" name="images[]" id="file-input" multiple class="hidden">
                    </div>
                    <div>
                        <button type="button" data-ripple-light="true" data-popover-target="emoji-popover" id="emojis-btn" class="rounded-full shadow-out active:shadow-in p-2 text-1xl">😀</button>
                        <div id="emoji-div" data-popover="emoji-popover" class="absolute overflow-y-auto overflow-x-hidden z-20 max-w-sm max-h-52 grid grid-cols-12 bg-white p-2 border border-gray-500 rounded-md shadow-md"></div>
                    </div>
                    <div class="w-full">
                        <div id="upload-container" class="grid grid-cols-6 gap-3"></div>
                        <textarea name="message" id="message" rows="1" placeholder="Aa..." class="w-full h-10 resize-none outline-none border-none ring-offset-0 focus:shadow-in-after rounded-lg shadow-in p-2 bg-gray-100"></textarea>
                    </div>
                    <div class="flex items-center">
                        <button type="submit" class="text-blue-500 rounded-full hover:scale-125 ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 active:w-7 active:h-7">
                                <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  

<?php view('partials/footer') ?>
<script src="static/chat.js"></script> 