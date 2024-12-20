<?php

require "./config.php";

session_start();

if (!isset($_SESSION['user_id']) || (!($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin'))) {
    header("Location: login.php");
    exit();
}
$id = $_SESSION['user_id'];


$sql = "select menu.nom , Reservation.dateReservation , Reservation.heur , Reservation.nbrPerson , Reservation.status , Reservation.id from Reservation join menu on menu.id = Reservation.MenuId;";
$result = mysqli_query($conn,$sql);

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
<body>
<section class=" relative bg-[url('./image/hero.png')] bg-cover bg-no-repeat my-3 mx-7 h-96">
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
            <!-- nav 2 needed -->
        </header>
        <hr class="text-white w-[80%] mx-auto mt-5">
        <main class="flex flex-col justify-center items-center h-56 mt-4">
                <h1 class="font-primary text-white text-[40px] md:text-[80px]">Reservation</h1>
                <img src="./image/explore_badge.png" class="absolute bottom-2 right-2 w-20 lg:w-auto" alt="">
        </main>
        <!-- Modal -->
<div id="editModal" class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50">
    <div class="bg-white p-5 rounded-lg w-96">
        <h2 class="text-xl font-bold mb-4">Edit Reservation</h2>
        <form id="editForm" action="./UpdateReservation.php" method="POST">
            <input type="hidden" name="reservation_id" id="reservation_id">
            <div class="mb-4">
                <label for="date" class="block mb-1">Date:</label>
                <input type="date" id="date" name="dateReservation" class="border border-gray-300 p-2 w-full rounded-md">
            </div>
            <div class="mb-4">
                <label for="time" class="block mb-1">Time:</label>
                <input type="time" id="time" name="heur" class="border border-gray-300 p-2 w-full rounded-md">
            </div>
            <div class="mb-4">
                <label for="nbrPerson" class="block mb-1">Number of Persons:</label>
                <input type="number" id="nbrPerson" name="nbrPerson" class="border border-gray-300 p-2 w-full rounded-md">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save</button>
            </div>
        </form>
    </div>
</div>

    </section>
    <div class="flex flex-wrap justify-center w-[80%] mx-auto gap-3">
        <?php while($data = mysqli_fetch_assoc($result)): ?>
        <div class="bg-gray-100 border border-[#222222] rounded-md shadow-sm w-64  ">
            <div class="flex justify-between p-2">
                <h3 class="text-[#222222] font-primary font-semibold"><?php echo $data['nom']; ?></h3>
                <p class="flex gap-1 items-center text-[#C0A677]"><img class="w-4 h-4" src="./image/agenda.png"/><?php echo $data['dateReservation'] ?></p>
            </div>
            <div class="flex justify-end pr-2 pb-2">
                <p class="flex gap-1 items-center"><img class="w-4 h-4" src="./image/horloge.png"/><?php echo $data['heur'] ?></p>
            </div>
            <div class="flex justify-between px-2 items-center">
                <p><?php echo $data['nbrPerson']?>: person</p>
                <p class="border border-black p-2 rounded-lg"><?php echo $data['status']?></p>
            </div>
            <div class="flex justify-center items-center gap-2 py-2">
                <button class="Editer bg-[#C0A677] px-2 py-1 rounded-lg text-white" data-id="<?php echo $data['id']?>" data-date="<?php echo $data['dateReservation'] ?>" data-heur="<?php echo $data['heur']?>" data-nbr="<?php echo $data['nbrPerson'] ?>" data-status = "<?php echo $data['status'] ?>">Editer</button>
                <a href="./SupprimerReservation.php?id=<?php echo $data['id']?>">supprimer</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <footer class=" bg-[url('./image/BG.png')] bg-cover mx-7 h-full mt-2">
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
    <script>
        const Editer = document.querySelectorAll(".Editer");
        const modal = document.getElementById("editModal");
        const closeModal = document.getElementById("closeModal");
        const form = document.getElementById("editForm");
        // modal fields
        const reservationIdInput = document.getElementById("reservation_id");
        const dateInput = document.getElementById("date");
        const timeInput = document.getElementById("time");
        const nbrPersonInput = document.getElementById("nbrPerson");
        Editer.forEach(button => {
            button.addEventListener("click",()=>{
                const id = button.dataset.id;
                const date = button.dataset.date
                const time = button.dataset.heur
                const nbr = button.dataset.nbr

                reservationIdInput.value = id;
                dateInput.value = date;
                timeInput.value = time
                nbrPersonInput.value = nbr

                modal.classList.remove("hidden");
            })
        });
        closeModal.addEventListener("click",()=>{
            modal.classList.add("hidden");
        })
    </script>
</body>
</html>