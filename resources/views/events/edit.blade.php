<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event - Event Hub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Event</h1>

        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Event Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $event->name) }}"
                    class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter event name"
                    required
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter event description"
                >{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Location Field -->
            <div class="mb-6">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                <input
                    type="text"
                    id="location"
                    name="location"
                    value="{{ old('location', $event->location) }}"
                    class="w-full px-4 py-2 border @error('location') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter event location"
                >
                @error('location')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date Field -->
            <div class="mb-8">
                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Event Date</label>
                <input
                    type="date"
                    id="date"
                    name="date"
                    value="{{ old('date', $event->date?->format('Y-m-d')) }}"
                    class="w-full px-4 py-2 border @error('date') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required
                >
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex flex-col md:flex-row gap-3 md:gap-4">
                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg transition duration-400 hover:bg-green-700 font-medium w-full md:w-auto text-center"
                >
                    Update Event
                </button>
                <a
                    href="{{ route('events.show', $event) }}"
                    class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg transition duration-400 hover:bg-gray-400 font-medium w-full md:w-auto text-center"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
