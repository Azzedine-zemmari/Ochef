<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <main class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-lg">
            <!-- Logo -->
            <div class="flex justify-center">
                <img src="./image/ochef-removebg-preview.png" alt="Logo" class="h-20 w-auto">
            </div>

            <!-- Header -->
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Sign up</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Already have an account? 
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in here</a>
                </p>
            </div>

            <!-- Form -->
            <form action="./registerPros.php" method="POST" class="mt-8 space-y-6">
                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label class="flex items-center text-sm font-medium text-gray-700 mb-1">
                            Name
                        </label>
                        <input type="text" name="name" required 
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <!-- First Name -->
                    <div>
                        <label class="flex items-center text-sm font-medium text-gray-700 mb-1">
                            First Name
                        </label>
                        <input type="text" name="firstName" required 
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="flex items-center text-sm font-medium text-gray-700 mb-1">
                            Address
                        </label>
                        <input type="text" name="address" required 
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="flex items-center text-sm font-medium text-gray-700 mb-1">
                            Phone
                        </label>
                        <input type="tel" name="tel" required 
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="flex items-center text-sm font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <input type="email" name="email" required 
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="flex items-center text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
                        <input type="password" name="password" required 
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                        Sign up
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>