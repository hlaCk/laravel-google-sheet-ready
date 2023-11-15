<x-guest-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 p-6">
        <div>
            <h1 class="text-3xl">{{ config('app.name') }}</h1>
            <p>
                Service Account.
                <a href="https://docs.google.com/spreadsheets/d/1vJ0fbZsidLBv2zJqP_FvXj7aReBwaVKtXW1OV-8i4L0/edit#gid=0"
                   target="_blank"
                   class="text-indigo-500 underline">Sheet</a>
            </p>
            <livewire:sheets.form></livewire:sheets.form>
            <livewire:sheets.posts></livewire:sheets.posts>

            <div class="mt-3 space-y-3">
                @foreach($posts as $post)
                    <div class="rounded-md shadow-md p-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="font-bold">{{ $post['name'] }}</h5>
                        </div>
                        <p class="mb-1">
                            {{ $post['message'] }}
                        </p>
                        <small>
                            {{ $post['created_at'] }} {{ config('app.timezone') }}
                        </small>
                    </div>
                @endforeach
            </div>

        </div>
        <div>
            <iframe
                    src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQO0CEKQ-buHb3kw37whGYsbxaLjORjO5c9yIOrVWiKDJz4BZ8ML9jn0APg3yKf6JkAGCLBUSv3QkzZ/pubhtml?widget=true&amp;headers=false"
                    class="p-1 w-full h-full"
            ></iframe>
        </div>
    </div>
</x-guest-layout>
