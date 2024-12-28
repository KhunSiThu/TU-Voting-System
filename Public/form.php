<?php require_once "../Components/header.php" ?>



<!-- Login -->
<div class="login flex w-screen h-screen justify-center items-center">
    <div id="login" class="flex flex-col min-w-full justify-center">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm flex flex-col justify-center items-center">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
            </div>
        </div>

        <div class="mt-10 w-full">
            <form class="space-y-6" action="#" method="POST" id="login-form">
                <div>
                    <label for="name_email" class="block text-sm font-medium text-gray-900">Username or Email</label>
                    <div class="mt-2">
                        <input type="text" name="name_email" id="name_email"
                            class="block w-full rounded-md bg-white p-3 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                    </div>
                    <p class="emailErro text-red-500 text-sm mt-1"></p> <!-- Error message for email -->
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                    <div class="mt-2 relative w-full">
                        <input type="password" name="password" id="password"
                            class="block w-full rounded-md bg-white p-3 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600 sm:text-sm" />
                        <i class="eye-icon fa-regular fa-eye-slash absolute right-2 top-4 cursor-pointer"></i>
                    </div>
                    <p class="passErro text-red-500 text-sm mt-1"></p> <!-- Error message for password -->
                </div>



                <div class="flex justify-center">
                    <button type="button" id="login-btn"
                        class="flex w-1/3 justify-center rounded-md bg-indigo-600 p-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-indigo-600">
                        Sign In
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>

<script src="../JS/form.js"></script>
<?php require_once "./Components/footer.php" ?>