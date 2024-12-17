<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Marcellus&display=swap');
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'primary': ["Marcellus","serif"],
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-[#F8F2F1]">
    <section class=" relative bg-[url('./image/hero.png')] bg-cover bg-no-repeat my-3 mx-7 h-96">
        <header>
            <nav class="flex justify-between items-center px-3 pt-2">
                <img src="./image/logo.png" class="w-auto h-10" alt="">
                <div class="hidden md:flex items-center space-x-10 mx-auto">
                    <a href="#" class="text-white">Home</a>
                    <a href="#" class="text-white">Menu</a>
                    <a href="#" class="text-white">Reservation</a>
                    <a href="#" class="text-white">Contact</a>
                    <a class="text-white border border-white text-sm ho py-2 px-6 rounded-full ">Rerserver</a>
                </div>
            </nav>
            <!-- nav 2 needed -->
        </header>
        <hr class="text-white w-[80%] mx-auto mt-5">
        <main class="flex flex-col justify-center items-center h-56 mt-4">
                <h1 class="font-primary text-white text-[40px] md:text-[80px]">Elegant Oasis</h1>
                <p class="text-white max-w-lg text-xs md:text-base md:max-w-xl text-center">Step into our world of refined luxury, where every detail has been meticulously considered to create a truly unforgettable dining experience.</p>
                <button class="bg-white rounded-full text-sm ho py-2 px-6 text-[#C0A677] mt-5">Reserver</button>
                <img src="./image/explore_badge.png" class="absolute bottom-2 right-2 w-20 lg:w-auto" alt="">
                <div class="flex space-x-2 lg:space-x-3 mt-5">
                    <p class="font-primary text-white uppercase  font-bold text-xs md:text-[20px]">Comfort</p>
                    <p class="font-primary text-white">.</p>
                    <p class="font-primary text-white uppercase font-bold text-xs md:text-[20px]">Tastes</p>
                    <p class="font-primary text-white">.</p>
                    <p class="font-primary text-white uppercase font-bold text-xs md:text-[20px]">INDULGENCE</p>
                    <p class="font-primary text-white">.</p>
                    <p class="font-primary text-white uppercase font-bold text-xs md:text-[20px]">EXPERIENCES</p>
                </div>
        </main>
    </section>
    <section>
        <div class="flex flex-col justify-center items-center">
            <h2 class="font-primary text-[40px] font-bold">Our Menu</h2>
            <p class="text-[#727272]">We have everything you need for any occasion, from a special event to a simple meal at home</p>
        </div>
        <div class="flex flex-col md:flex-row justify-center items-center space-x-5 mt-5">
            <div class="flex flex-col text-left">
                <img src="./image/img1.png" class="" alt="">
                <p class="font-bold font-primary text-[20px]">Classic Lasagna</p>
                <p class="max-w-md text-[#727272] text-sm">Layers of pasta, cheese, and meat sauce baked to golden brown perfection.</p>
            </div>
            <div class="flex flex-col text-left">
                <img src="./image/img2.png" class="" alt="">
                <p class="font-bold font-primary text-[20px]">Classic Lasagna</p>
                <p class="max-w-md text-[#727272] text-sm">Layers of pasta, cheese, and meat sauce baked to golden brown perfection.</p>
            </div>
            <div class="flex flex-col text-left">
                <img src="./image/img3.png" class="" alt="">
                <p class="font-bold font-primary text-[20px]">Classic Lasagna</p>
                <p class="max-w-md text-[#727272] text-sm">Layers of pasta, cheese, and meat sauce baked to golden brown perfection.</p>
            </div>
        </div>
        <div class="flex justify-center items-center my-5">
            <a href="#" class="border-[2px] rounded-full py-2 px-20 bg-white  ">View menu</a>
        </div>
    </section>
    <!-- about -->
    <section class="mt-4 mx-7 py-7 bg-white">
        <div class="flex flex-col space-y-4 justify-center items-center">
            <h4 class="text-[20px] lg:text-[30px] font-primary font-bold">What People Say About Us</h4>
            <img src="./image/about.png" alt="">
            <p class="max-w-md text-sm  lg:text-base lg:max-w-lg text-center text-[#727272]">I had the most amazing experience at this restaurant! The food was absolutely delicious and the service was impeccable. I will definitely be coming back!</p>
        </div>
    </section>
    <footer class=" bg-[url('./image/BG.png')] bg-cover mx-7 h-full">
    <div class="flex flex-wrap justify-center gap-0 lg:gap-96 px-10">
    <div class="flex flex-col space-y-2 py-7">
            <h4 class="font-primary text-white text-lg lg:text-[30px]">Contact</h4>
            <ul class="space-y-2">
                <li class="text-[#C0A677]">123 Main StreetNew York, NY 10001</li>
                <li class="text-[#C0A677]">(123) 456-7890</li>
                <li class="text-[#C0A677]">info@luxuryrestaurant.com</li>
            </ul>
        </div>
        <div class="flex flex-col space-y-2 py-7">
            <h4 class="font-primary text-white text-lg lg:text-[30px]">Newsletter</h4>
            <p>Subscribe to our newsletter and get our latest updates</p>
            <input type="Email" placeholder="Email *" class="border-none outline-none bg-black text-white">
            <hr class="text-white ">
            <button class="bg-[#C0A677] text-white rounded-full py-2 px-4 w-32">Subscribe</button>
        </div>
    </div>    
    <hr class="text-white">
    <p class="text-center text-white font-semibold py-2">© 2024 Luxury chef. All rights reserved</p>
   
    </footer>

</body>

</html>