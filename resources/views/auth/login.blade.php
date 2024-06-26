<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Tailwind CSS here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />


   
</head>
<body class="bg-gray-900">
    <section class="bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <span href="#" class="flex items-center mb-6 text-2xl font-semibold text-white">
                Log in to Tasselte products
            </span>
            <div class="w-full  rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight  md:text-2xl text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-white">email</label>
                            <input id="email" type="email" name="email" placeholder="abcd@example.xyz" class=" border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-600 focus:border-primary-600 @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <p class="text-red-500 text-xs mt-3 ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                        <div class="relative">
                            <input id="password" type="password" name="password" placeholder="••••••••" class="bg-gray-50 border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-600 focus:border-primary-600 @error('password') border-red-500 @enderror" required autocomplete="current-password">
                            <!-- Toggle container with icons -->
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <!-- Closed eye icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-6 w-6 toggle-icon open-eye cursor-pointer hidden" onclick="toggleVisibility(this)" style="fill: white;">
                                <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                            </svg>
                            <!-- Open eye icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="h-6 w-6 toggle-icon closed-eye cursor-pointer" onclick="toggleVisibility(this)" style="fill: white;">
                                <path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
                            </svg>
                        </div>

                        </div>
                            @error('password')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <script>
                        function toggleVisibility(icon) {
                            const passwordInput = document.getElementById('password');
                            const isClosedEye = icon.classList.contains('closed-eye');
                            
                            if (isClosedEye) {
                                // Change input type to 'text'
                                passwordInput.type = 'text';
                                // Hide open eye icon, show closed eye icon
                                icon.classList.add('hidden');
                                icon.previousElementSibling.classList.remove('hidden');
                            } else {
                                // Change input type back to 'password'
                                passwordInput.type = 'password';
                                // Hide closed eye icon, show open eye icon
                                icon.classList.add('hidden');
                                icon.nextElementSibling.classList.remove('hidden');
                            }
                        }
                        </script>


                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border rounded focus:ring-3 bg-gray-700 border-gray-600 focus:ring-primary-600 ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-300">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign in</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
