<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Emily Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Main container -->
    <div class="relative min-h-screen">
        <!-- Navigation -->
        <nav class="absolute w-full flex justify-between items-center px-8 py-4 z-50">
            <button class="text-white text-sm uppercase tracking-wider">Menu</button>
            <a href="#" class="text-white text-sm uppercase tracking-wider">Emily Hotel</a>
            <div class="flex space-x-6">
                <a href="#" class="text-white text-sm uppercase tracking-wider">Our Locations</a>
                <a href="#" class="text-white text-sm uppercase tracking-wider">Book Now</a>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative h-screen">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 bg-[url('/api/placeholder/1920/1080')] bg-cover bg-center">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>

            <!-- Content -->
            <div class="relative h-full flex flex-col items-center justify-center text-white">
                <!-- Hotel Name -->
                <h1 class="text-6xl md:text-7xl font-light tracking-widest text-center mb-16">
                    GRAND EMILY HOTEL
                </h1>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-8 mb-12">
                    <a href="#" class="text-sm uppercase tracking-wider">Suites</a>
                    <span>•</span>
                    <a href="#" class="text-sm uppercase tracking-wider">Rooms</a>
                </div>

                <!-- CTA Button -->
                <button class="px-8 py-3 border border-white text-sm uppercase tracking-wider hover:bg-white hover:text-black transition-colors">
                    Let's Go
                </button>

                <!-- Description -->
                <p class="absolute bottom-12 max-w-2xl mx-auto text-center text-sm px-4 text-gray-300">
                    Grand Emily Hotel is part of the new Emily Research family's latest type. The large-scale interior will be home to everyone in the new rooms in the News Village of families coming up. These guests will be up to date before you get the fun and get a comfortable evening when experiencing the new style in the hotel.
                </p>
            </div>
        </div>
    </div>
</body>
</html>