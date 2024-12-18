<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body>
    <section class="flex">
        <aside class="hidden lg:w-1/5 lg:flex flex-col bg-[#161615] h-screen px-3">
            <img src="./image/logo.png" class="w-20 h-10" alt="">
            <a href="#" class="text-[#C0A677] pt-10">Dashboard</a>
            <a href="#" class="text-[#C0A677] pt-10">Menu</a>
        </aside>
        <main class="w-full">
        <!-- statistique -->
        <div class="flex justify-between md:justify-end  bg-[#161615] text-white p-3 ">
            <p class="font-bold text-white">Welcome admin</p>
            <img src="./image/icons8-menu-50.png" id="MenuBg" class="w-7 h-7 md:hidden" alt="">
        </div>
        <div id="menu" class="hidden absolute bg-[#161615] rounded-lg p-2 ">
            <a href="#" class="text-[#C0A677] pt-10">Dashboard</a>
            <a href="#" class="text-[#C0A677] pt-10">Menu</a>
        </div>
        <div class="flex flex-wrap gap-2 m-2">
            <div class="bg-gray-100 rounded-lg p-1 md:px-2 md:py-2 flex flex-col w-32  shadow-lg md:w-40">
                <p class="text-red-500 font-semibold text-[40px]">20</p>
                <p class="text-black text-sm font-primary md:text-lg ">Demand en attent</p>
            </div>
            <div class="bg-gray-100 rounded-lg p-1 md:px-2 md:py-2 flex flex-col w-32 shadow-md  md:w-40">
                <p class="text-yellow-500 font-semibold text-[40px]">20</p>
                <p class="text-black text-sm font-primary md:text-lg ">Demand approver</p>
            </div>
            <div class="bg-gray-100 rounded-lg p-1 w-32 md:px-2 md:py-2 flex flex-col  shadow-md  md:w-48">
                <p class="text-green-500 font-semibold text-[40px]">20</p>
                <p class="text-black text-sm font-primary md:text-lg ">Demand a demain </p>
            </div>
            <div class="bg-gray-50 rounded-lg p-1 md:px-2 md:py-2 flex flex-col w-32 shadow-md  md:w-40">
                <p class="text-indigo-500 font-semibold text-[40px]">20</p>
                <p class="text-black text-sm  font-primary md:text-lg ">Users</p>
            </div>
        </div>
        <?php 
            require "./config.php";
            $sql = "select client.nom as ClientNom , Reservation.id , menu.nom as MenuNom , Reservation.dateReservation , Reservation.heur , Reservation.nbrPerson , Reservation.status from Reservation 
            join client on client.id = Reservation.clientId 
            join menu on Reservation.MenuId = menu.id;";
            $result = mysqli_query($conn,$sql);
        ?>
        <div class="overflow-x-auto">
                <table class="w-full text-left overflow-x-auto">
                    <thead>
                        <tr>
                            <th class="px-2 md:px-6 py-3">#</th>
                            <th class="px-2 md:px-6 py-3">clientID</th>
                            <th class="px-2 md:px-6 py-3">Menu</th>
                            <th class="px-2 md:px-6 py-3">dateReservation</th>
                            <th class="px-2 md:px-6 py-3">heur</th>
                            <th class="px-2 md:px-6 py-3">nbrPerson</th>
                            <th class="px-2 md:px-6 py-3">status</th>
                            <th class="px-2 md:px-6 py-3">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($reservations = mysqli_fetch_assoc($result)): ?>
                        <tr class="border-b">
                            <td class="px-2 md:px-6 py-3"><?php echo $reservations['id']?></td>
                            <td class="px-2 md:px-6 py-3"><?php echo $reservations['ClientNom']?></td>
                            <td class="px-2 md:px-6 py-3"><?php echo $reservations['MenuNom'] ?></td>
                            <td class="px-2 md:px-6 py-3"><?php echo $reservations['dateReservation'] ?></td>
                            <td class="px-2 md:px-6 py-3"><?php echo $reservations['heur'] ?></td>
                            <td class="px-2 md:px-6 py-3"><?php echo $reservations['nbrPerson'] ?></td>
                            <td class="px-2 md:px-6 py-3"><?php echo $reservations['status'] ?></td>
                            <td class="px-2 md:px-6 py-3 flex space-x-2">
                                <a class="" href=""><img src="./image/approuve.png" class="w-10" alt=""></a>
                                <a class="" href=""><img src="./image/interdit.png" class="w-10" alt=""></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </section>
    <script>
        const bgMenu = document.getElementById("MenuBg");
        const menu = document.getElementById("menu")
        bgMenu.addEventListener("click",()=>{
            menu.classList.toggle("hidden");
        })
    </script>
</body>
</html>