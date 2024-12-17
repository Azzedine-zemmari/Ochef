<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="flex">
        <aside class="w-1/5 flex flex-col bg-[#161615] h-screen px-3">
            <img src="./image/logo.png" class="w-20 h-10" alt="">
            <a href="#" class="text-[#C0A677] pt-10">Dashboard</a>
        </aside>
        <main class="w-3/4">
        <!-- statistique -->
        <div class="flex space-x-3 mx-2">
            <div class="bg-red-600 rounded-lg px-2 py-2 flex flex-col w-40">
                <p class="text-white text-[40px]">20</p>
                <p class="text-white text-lg ">Demand en attent</p>
            </div>
            <div class="bg-green-600 rounded-lg px-2 py-2 flex flex-col w-40">
                <p class="text-white text-[40px]">20</p>
                <p class="text-white text-lg ">Demand approver</p>
            </div>
            <div class="bg-indigo-600 rounded-lg px-2 py-2 flex flex-col w-63">
                <p class="text-white text-[40px]">20</p>
                <p class="text-white text-lg ">Demand a pour jour suivant</p>
            </div>
            <div class="bg-yellow-600 rounded-lg px-2 py-2 flex flex-col w-40">
                <p class="text-white text-[40px]">20</p>
                <p class="text-white text-lg ">Users</p>
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
                            <th class="px-2 md:px-6 py-3">date_fin</th>
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
                            <td class="px-2 md:px-6 py-3"></td>
                            <td class="px-2 md:px-6 py-3"></td>
                            <td class="px-2 md:px-6 py-3"></td>
                            <td class="px-2 md:px-6 py-3"></td>
                            <td class="px-2 md:px-6 py-3"></td>
                            <td class="px-2 md:px-6 py-3 flex space-x-2">
                                <a class="bg-blue-400 text-white p-3 rounded-lg" href="./EditActivite.php?id_client=<?php echo $data["id_activite"] ?>">Edit</a>
                                <a class="bg-red-400 text-white p-3 rounded-lg" href="./DeleteActivite.php?id_client=<?php echo $data["id_activite"] ?>">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </section>
</body>
</html>