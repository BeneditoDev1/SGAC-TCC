<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .body{
            background-color: green;
        }
    </style>
</head>

<body>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        This is a secure area of the application. Please confirm your password before continuing.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password" required autocomplete="current-password"
                class="block mt-1 w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit"
                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Confirm
            </button>
        </div>
    </form>
</body>

</html>
