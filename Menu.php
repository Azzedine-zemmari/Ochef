<?php
session_start();
if (!isset($_SESSION['user_id']) || (!($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin'))) {
    header("Location: login.php");
    exit();
}
?>
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
                        'primary': ["Marcellus", "serif"],
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-[#F8F2F1]">
<?php   if (isset($_SESSION['succe'])): 
    ?>
    <div id="successModal" class=" fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg w-1/3 p-6 relative">
            <button 
                id="closeSuccessModal" 
                class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">
                &times;
            </button>
            <h3 class="text-xl font-primary mb-4 text-[#C0A677]">Success</h3>
            <p class="text-gray-600 mb-6">
                <?php echo $_SESSION['succe']; ?>
            </p>
            <button id="confirmSuccess" class="bg-[#C0A677] px-4 py-2 rounded-md text-white">OK</button>
        </div>
    </div>
    <?php
    unset($_SESSION['succe']); endif; ?>
    <!-- Hero Section -->
    <section class="relative bg-[url('./image/hero.png')] bg-cover bg-no-repeat my-3 mx-7 h-96">
        <header>
            <nav class="flex justify-between items-center px-3 pt-2">
                <img src="./image/logo.png" class="w-auto h-10" alt="">
                <div class="hidden md:flex items-center space-x-10 mx-auto">
                    <a href="./Home.php" class="text-white">Home</a>
                    <a href="./Menu.php" class="text-white">Menu</a>
                    <a href="./Reservation.php" class="text-white">Reservation</a>
                    <a href="#" class="text-white">Contact</a>
                    <a href="./logout.php" class="text-white border border-white text-sm ho py-2 px-6 rounded-full ">logout</a>
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
    <section class="relative">
        <div class="flex flex-wrap justify-center mx-7 my-5">
            <div class="border border-black bg-white rounded-lg w-full px-5 py-4">

                <?php
                require "./config.php";

                $sql = "SELECT menu.nom as MenuName, Plat.nom as PlatName, Plat.ingrediant , Plat.image
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
                    <img src='{$row['image']}' class='w-20 h-20 object-cover rounded-lg' alt='Dish'>
                    <div>
                        <h4 class='font-primary text-lg text-[#333]'>{$row['PlatName']}</h4>
                        <p class='text-sm text-gray-600'>{$row['ingrediant']}</p>
                    </div>
                </div>";
                }
                ?>
                <div class="flex justify-center mt-5">
                    <button id="Reserver" class="border-[2px] rounded-full py-2 px-20 bg-[#C0A677] text-white">
                        Reserver
                    </button>
                </div>
            </div>
                <!-- pop up -->
<div 
    class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50" 
    id="pop_up">
    <div class="bg-white rounded-lg w-1/2 p-6 relative">
        <button 
            id="ClosePopUp" 
            class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">
            &times;
        </button>
        <h3 class="text-xl font-primary mb-4">Reservation</h3>
        <p class="text-gray-600 mb-6">
            Thank you for choosing us. Please provide your details below to complete your reservation.
        </p>
        <form   action="" method="POST">
            <div class="flex gap-5">
                <div class="flex flex-col">    
                <label for="nbr" class="text-[#C0A677] font-primary font-semibold">N Person:</label>
                <input type="number" id="nbr" name="nbrPerson" class="shadow-md">
                </div>
                <div class="flex flex-col">
                <label for="date" class="text-[#C0A677] font-primary font-semibold">agenda</label>
                <input type="date" id="date" name="dateReservation"  class="shadow-md">
                </div>
                <div class="flex flex-col">
                <label for="heur" class="text-[#C0A677] font-primary font-semibold">time</label>
                <input type="time" id="heur" name="heur"  class="shadow-md">
                </div>
                <div class="flex flex-col">
                    <label for="menu" class="text-[#C0A677] font-primary font-semibold">Menu</label>
                    <select name="menu" id="menu">
                    <?php
                        $sql = "select id, nom from menu ;";
                        $query = mysqli_query($conn,$sql);
                        while($output = mysqli_fetch_assoc($query)){
                            echo "
                            <option value={$output['id']}>{$output['nom']}</option>
                            ";
                        }
                    ?>
                    </select>
                </div>
                <button name="submit" class="justify-end bg-black px-3 py-2 rounded-md text-white">submit</button>
            </div>
        </form>
    </div>
</div>

        </div>
    </section>
    <?php 
    if(isset($_POST['submit'])){
        $nbrPerson = $_POST['nbrPerson'];
        $dateReservation = $_POST['dateReservation'];
        $time = $_POST['heur'];
        $menu = $_POST['menu'];
        $client = $_SESSION['user_id'];
        $SQL = "insert into Reservation(clientId,MenuId,dateReservation,heur,nbrPerson) values(?,?,?,?,?);";
        $stmt = mysqli_prepare($conn,$SQL);
        mysqli_stmt_bind_param($stmt,"iissi",$client,$menu,$dateReservation,$time,$nbrPerson);
        if(mysqli_stmt_execute($stmt)){
            $_SESSION['succe'] = "Rservation created successfuly !";
            ?>
            <script> window.location.href = 'Menu.php'</script>
            <?php
        }
        else{
            $_SESSION['message'] = "an error occured will creation Reservation !";

        }
    } 
    ?>

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
    <script>
        const reserver = document.getElementById("Reserver");
        const pop_up = document.getElementById("pop_up");
        const ClosePopUp = document.getElementById("ClosePopUp");
        reserver.addEventListener("click",()=>{
            pop_up.classList.toggle("hidden")
        })
        ClosePopUp.addEventListener("click",()=>{
            pop_up.classList.toggle("hidden");
        })
        // it target the background of the pop up but this will target all the page because of inset-0 in the pop up
        window.addEventListener("click",(e)=>{
            if(e.target == pop_up){
                pop_up.classList.toggle("hidden");
            }
        })

    const successModal = document.getElementById("successModal");
    const closeSuccessModal = document.getElementById("closeSuccessModal");
    const confirmSuccess = document.getElementById("confirmSuccess");

    if (successModal) {
        closeSuccessModal.addEventListener("click", () => {
            successModal.style.display = "none";
        });

        confirmSuccess.addEventListener("click", () => {
            successModal.style.display = "none";
        });

        // Optional: Close modal on clicking outside it
        window.addEventListener("click", (e) => {
            if (e.target === successModal) {
                successModal.style.display = "none";
            }
        });
    }
    </script>
</body>

</html>