<?php view('partials/header') ?>

<div class="flex justify-center items-center h-screen">
    <div class="shadow-out rounded-xl p-8 w-80"> 
        <h1 class="text-center font-extra-bold text-text text-3xl font-poppins mb-5">
            Register
        </h1>
        <div id="error-msg"> </div>
        <form id="login-form">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Password
                </label>
            </div>
            <button type="submit" class="w-full py-3 text-text rounded-full font-bold shadow-out font-poppins text-xl active:shadow-in">
                Sign up
            </button>
            <div class="text-center mt-4 text-gray-500">
                Already a member?
                <a href="/" class="text-sky-500 hover:underline">
                    login now
                </a>
            </div>
        </form>
    </div>
</div>

<?php view('partials/footer') ?>
