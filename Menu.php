<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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

<!-- Hero Section -->
<section class="relative bg-[url('./image/hero.png')] bg-cover bg-no-repeat my-3 mx-7 h-96">
    <header>
        <nav class="flex justify-between items-center px-3 pt-2">
            <img src="./image/logo.png" class="w-auto h-10" alt="">
            <div class="hidden md:flex items-center space-x-10 mx-auto">
                <a href="./Home.php" class="text-white">Home</a>
                <a href="./Menu.php" class="text-white">Menu</a>
                <a href="#" class="text-white">Reservation</a>
                <a href="#" class="text-white">Contact</a>
                <a class="text-white border border-white text-sm py-2 px-6 rounded-full">Reserver</a>
            </div>
        </nav>
    </header>
    <hr class="text-white w-[80%] mx-auto mt-5">
    <main class="flex flex-col justify-center items-center h-56 mt-4">
        <h1 class="font-primary text-white text-[40px] md:text-[80px]">Menu</h1>
        <p class="text-white max-w-lg text-xs md:text-base md:max-w-xl text-center">Develop and design innovative menus that align with current culinary trends.</p>
        <img src="./image/explore_badge.png" class="absolute bottom-2 right-2 w-20 lg:w-auto" alt="">
    </main>
</section>

<!-- Menu Section -->
<section>
    <div class="flex flex-wrap justify-center mx-7 my-5">
        <div class="border border-black bg-white rounded-lg w-full px-5 py-4">

            <?php
            require "./config.php";

            $sql = "SELECT menu.nom as MenuName, Plat.nom as PlatName, Plat.ingrediant 
                    FROM Plat 
                    JOIN menu ON menu.id = Plat.menuId 
                    ORDER BY menu.nom";

            $result = mysqli_query($conn, $sql);

            $currentMenu = ""; 
            while ($row = mysqli_fetch_assoc($result)) {
                if ($currentMenu != $row['MenuName']) {
                    $currentMenu = $row['MenuName'];
                    echo "<h2 class='text-center text-[#C0A677] text-3xl font-primary mt-5 mb-3'>" . $currentMenu . "</h2>";
                }

                echo "
                <div class='flex gap-4 items-center py-3 border-b border-gray-200'>
                    <img src='./image/img1.png' class='w-20 h-20 object-cover rounded-lg' alt='Dish'>
                    <div>
                        <h4 class='font-primary text-lg text-[#333]'>{$row['PlatName']}</h4>
                        <p class='text-sm text-gray-600'>{$row['ingrediant']}</p>
                    </div>
                </div>";
            }
            ?>
            <div class="flex justify-center mt-5">
    <button class="border-[2px] rounded-full py-2 px-20 bg-[#C0A677] text-white">
        Reserver
    </button>
</div>
        </div>

    </div>
</section>

<!-- Footer -->
<footer class="bg-[url('./image/BG.png')] bg-cover mx-7 h-full">
    <div class="flex flex-wrap justify-center gap-0 lg:gap-96 px-10">
        <div class="flex flex-col space-y-2 py-7">
            <h4 class="font-primary text-white text-lg lg:text-[30px]">Contact</h4>
            <ul class="space-y-2">
                <li class="text-[#C0A677]">123 Main Street, New York, NY 10001</li>
                <li class="text-[#C0A677]">(123) 456-7890</li>
                <li class="text-[#C0A677]">info@luxuryrestaurant.com</li>
            </ul>
        </div>
        <div class="flex flex-col space-y-2 py-7">
            <h4 class="font-primary text-white text-lg lg:text-[30px]">Newsletter</h4>
            <p>Subscribe to our newsletter and get our latest updates</p>
            <input type="email" placeholder="Email *" class="border-none outline-none bg-black text-white px-4 py-2 rounded">
            <hr class="text-white">
            <button class="bg-[#C0A677] text-white rounded-full py-2 px-4 w-32">Subscribe</button>
        </div>
    </div>
    <hr class="text-white">
    <p class="text-center text-white font-semibold py-2">© 2024 Luxury Chef. All rights reserved</p>
</footer>

</body>
</html>
