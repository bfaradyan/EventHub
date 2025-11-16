<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->name }} - Event Hub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="bg-white rounded-lg shadow overflow-hidden">

        <!-- Header -->
        <div class="bg-blue-600 text-white px-8 py-6">
            <h1 class="text-3xl font-bold">{{ $event->name }}</h1>
            <p class="text-blue-100 mt-2">Event Details</p>
        </div>

        <!-- Content -->
        <div class="p-8">
            <!-- Event Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Location</h3>
                    <p class="text-lg text-gray-800">{{ $event->location ?? 'Not specified' }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Date</h3>
                    <p class="text-lg text-gray-800">{{ $event->date ? $event->date->format('F d, Y') : 'Not specified' }}</p>
                </div>
            </div>

            <!-- Description -->
            @if($event->description)
                <div class="mb-8">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase mb-3">Description</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $event->description }}</p>
                </div>
            @endif

            <!-- Metadata -->
            <div class="border-t pt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                    <div>
                        <p class="text-gray-500">Created</p>
                        <p class="text-gray-800">{{ $event->created_at->format('M d, Y - h:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Last Updated</p>
                        <p class="text-gray-800">{{ $event->updated_at->format('M d, Y - h:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col md:flex-row gap-3 md:gap-4 mt-8 border-t pt-6">
                <a
                    href="{{ route('events.edit', $event) }}"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-400 font-medium text-center w-full md:w-auto"
                >
                    Edit Event
                </a>
                <a
                    href="{{ route('events.index') }}"
                    class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-400 font-medium text-center w-full md:w-auto"
                >
                    Back to List
                </a>
                <form action="{{ route('events.destroy', $event) }}" method="POST" class="w-full md:w-auto">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition duration-400 font-medium w-full"
                        onclick="return confirm('Are you sure you want to delete this event?')"
                    >
                        Delete Event
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
