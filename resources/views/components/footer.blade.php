<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Main content goes here -->
    
    <!-- Content Slot -->
    <div class="flex-1">
        {{$slot}}
    </div>

    <!-- Footer -->
    <footer class="bg-white py-4 border-t border-gray-200">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <!-- Social Media Links -->
            <div class="mb-4">
                <h3 class="text-lg font-extrabold mb-2">Nos liens</h3>
                <div class="flex justify-center space-x-6">
                    <a href="https://www.facebook.com/TunisieTelecom/" class="text-black hover:text-blue-600 text-3xl transition-colors duration-200">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    
                    <a href="https://www.instagram.com/tunisietelecom/" class="text-black hover:text-blue-600 text-3xl transition-colors duration-200">
                        <i class="fab fa-instagram"></i>
                    </a>
                    
                    <a href="https://tn.linkedin.com/company/tunisie-t-l-com" class="text-black hover:text-blue-600 text-3xl transition-colors duration-200">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div class="text-gray-600">
                <p>&copy; 2024 Chaabi Med Aziz.</p>
            </div>
        </div>
    </footer>
</body>
