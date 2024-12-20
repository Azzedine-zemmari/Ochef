<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
require "./config.php";

$sql = "SELECT menu.id,menu.nom as MenuName, Plat.nom as PlatName, Plat.ingrediant 
    FROM Plat 
    JOIN menu ON menu.id = Plat.menuId 
    ORDER BY menu.nom;";
$result = mysqli_query($conn, $sql);
?>
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
                        'primary': ["Marcellus", "serif"],
                    },
                }
            }
        }
    </script>
</head>

<body>
    <section class="flex relative">
        <aside class="hidden lg:w-1/5 lg:flex flex-col bg-[#161615] min-h-screen px-3">
            <img src="./image/logo.png" class="w-20 h-10" alt="">
            <a href="./Dashboard.php" class="text-[#C0A677] pt-10">Dashboard</a>
            <a href="./MenuDash.php" class="text-[#C0A677] pt-10">Menu</a>
        </aside>
        <main class="w-full">
        <div class="flex justify-between items-center gap-2 md:justify-end  bg-[#161615] text-white p-3 ">
            <p class="font-bold text-white">Welcome admin</p>
            <img src="./image/icons8-menu-50.png" id="MenuBg" class="w-7 h-7 md:hidden" alt="">
            <a href="./logout.php"><img src="./image/OOF.png" class="w-5 h-5" alt=""></a>
        </div>
            <div id="menu" class="hidden absolute bg-[#161615] rounded-lg p-2 ">
                <a href="#" class="text-[#C0A677] pt-10">Dashboard</a>
                <a href="#" class="text-[#C0A677] pt-10">Menu</a>
            </div>
            <div class="flex justify-end gap-3 m-3">
                <button id="addMenu" class="bg-[#C0A677] text-[#161615] px-3 py-2 rounded-lg font-primary">Ajouter menu</button>
                <button id="addPlat" class="bg-[#C0A677] text-[#161615] px-3 py-2 rounded-lg font-primary">Ajouter plat</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left overflow-x-auto">
                    <thead>
                        <tr>
                            <th class="px-2 md:px-6 py-3">#</th>
                            <th class="px-2 md:px-6 py-3">MenuName</th>
                            <th class="px-2 md:px-6 py-3">PlatName</th>
                            <th class="px-2 md:px-6 py-3">ingrediant</th>
                            <th class="px-2 md:px-6 py-3">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="border-b">
                                <td class="px-2 md:px-6 py-3"><?php echo $row['id'] ?></td>
                                <td class="px-2 md:px-6 py-3"><?php echo $row['MenuName'] ?></td>
                                <td class="px-2 md:px-6 py-3"><?php echo $row['PlatName'] ?></td>
                                <td class="px-2 md:px-6 py-3"><?php echo $row['ingrediant'] ?></td>
                                <td class="px-2 md:px-6 py-3 flex space-x-2">
                                    <a class="" href="./aproveReservation.php?id=<?php echo $row['id'] ?>"><img src="./image/editer.png" class="w-10" alt=""></a>
                                    <a class="" href="./denyReservation.php?id=<?php echo $row['id'] ?>"><img src="./image/supprimer.png" class="w-10" alt=""></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
                <!-- pop add menu -->
             <?php 
        require "./config.php";
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $PlatName = $_POST['PlatName'];
            $Ingrediant = $_POST['Ingrediant'];
            $image = $_FILES['image']['name']; // name is the original name that the user insert
            if(!empty($name) && !empty($PlatName) && !empty($Ingrediant) && !empty($image)){
                $target_dir = "upload/"; // target folder
                $target_file = $target_dir . basename($image); // the final name of the file
                if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){ // swith the file name from the temprary name to the new name 
                    $sql = "insert into menu(nom) values('$name')";
                    $resultmenu = mysqli_query($conn,$sql);
                    if($resultmenu){
                        // Get the last id inserted in the menu table 
                        $menuID = mysqli_insert_id($conn);

                        $sql2 = "insert into Plat(nom,ingrediant,menuId,image) values('$PlatName','$Ingrediant','$menuID','$target_file')";
                        $resultPlat = mysqli_query($conn,$sql2);
                        if($resultPlat){
                            $_SESSION['message'] = "Menu and plate added successfully.";
                        }
                        else{
                            $_SESSION['message'] = "Failed to add the plate.";
                        }
                    }
                    else{
                        $_SESSION['message'] = "Failed to add the menu.";
                    }
                }
                else{
                    $_SESSION['message'] = "Failed  upload the image.";
                }
            }
            else{
                $_SESSION['message'] = "all the field are required";
            }
        }
        ?>
                <div
                    class="fixed inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center hidden z-50"
                    id="pop_add_menu">
                    <div class="bg-white rounded-lg w-1/2 p-6 relative">
                        <button
                            id="ClosePopUp"
                            class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">
                            &times;
                        </button>
                        <h3 class="text-xl font-primary mb-4">Add Menu</h3>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="flex flex-col gap-5">
                                <div class="flex flex-col">
                                    <label for="name" class="text-[#C0A677] font-primary font-semibold">Menu name</label>
                                    <input type="text" id="name" name="name" class="shadow-md">
                                </div>
                                <div class="flex flex-col">
                                    <label for="PlatName" class="text-[#C0A677] font-primary font-semibold">Plat name</label>
                                    <input type="text" id="PlatName" name="PlatName" class="shadow-md">
                                </div>
                                <div class="flex flex-col">
                                    <label for="Ingrediant" class="text-[#C0A677] font-primary font-semibold">Ingrediant</label>
                                    <input type="text" id="Ingrediant" name="Ingrediant" class="shadow-md">
                                </div>
                                <div class="flex flex-col">
                                    <label for="image" class="text-[#C0A677] font-primary font-semibold">plate image</label>
                                    <input type="file" id="image" name="image" class="shadow-md">
                                </div>
                                <button id="submit" name="submit" class="justify-end bg-black px-3 py-2 rounded-md text-white">submit</button>
                            </div>
                        </form>
                        <?php if(isset($_SESSION['message'])):?>
                            <p id="alert" class="text-green-500 font-primary mt-4">
                                <?php echo $_SESSION['message'] ?>
                            </p>
                            <?php unset($_SESSION['message']);  ?>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <!-- to insert a new plate in existed menu -->
                    <?php if(isset($_POST['SubmitPlate'])){
                        $menu = $_POST['Menu'];
                        $PlatNAme = $_POST['PlatNAme'];
                        $IngreDiant = $_POST['IngreDiant'];
                        $Image = $_FILES['Image']['name'];
                        $target_dir = "upload/"; // target folder
                        $target_file = $target_dir . basename($Image); // the final name of the file
                        if(move_uploaded_file($_FILES['Image']['tmp_name'],$target_file)){ // swith the file name from the temprary name to the new name 
                            $sql = "INSERT into Plat(nom,ingrediant,menuId,image) values(?,?,?,?); ";
                            $stmt = mysqli_prepare($conn,$sql);
                            mysqli_stmt_bind_param($stmt,"ssis",$PlatNAme,$IngreDiant,$menu,$target_file);
                            mysqli_stmt_execute($stmt);
                        }    
                    }
                    
                    ?>
                <div
                    class="fixed inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center hidden z-50"
                    id="pop_add_Plate">
                    <div class="bg-white rounded-lg w-1/2 p-6 relative">
                        <button
                            id="ClosePopUpPlate"
                            class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">
                            &times;
                        </button>
                        <h3 class="text-xl font-primary mb-4">Add plate</h3>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="flex flex-col gap-5">
                                <div class="flex flex-col">
                                    <label for="name" class="text-[#C0A677] font-primary font-semibold">Menu name</label>
                                    <select name="Menu" id="">
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
                                <div class="flex flex-col">
                                    <label for="PlatNAme" class="text-[#C0A677] font-primary font-semibold">Plat name</label>
                                    <input type="text" id="PlatNAme" name="PlatNAme" class="shadow-md">
                                </div>
                                <div class="flex flex-col">
                                    <label for="IngreDiant" class="text-[#C0A677] font-primary font-semibold">Ingrediant</label>
                                    <input type="text" id="IngreDiant" name="IngreDiant" class="shadow-md">
                                </div>
                                <div class="flex flex-col">
                                    <label for="Image" class="text-[#C0A677] font-primary font-semibold">plate image</label>
                                    <input type="file" id="Image" name="Image" class="shadow-md">
                                </div>
                                <button id="submit" name="SubmitPlate" class="justify-end bg-black px-3 py-2 rounded-md text-white">submit</button>
                            </div>
                        </form>
                        <?php if(isset($_SESSION['message'])):?>
                            <p id="alert" class="text-green-500 font-primary mt-4">
                                <?php echo $_SESSION['message'] ?>
                            </p>
                            <?php unset($_SESSION['message']);  ?>
                            <?php endif; ?>

                    </div>
                </div>
            </main>
    </section>
    
    <script>
        const bgMenu = document.getElementById("MenuBg");
        const menu = document.getElementById("menu");
        const addMenu = document.getElementById("addMenu");
        const addPlat = document.getElementById("addPlat");
        const pop_add_menu = document.getElementById("pop_add_menu");
        const pop_add_plate = document.getElementById("pop_add_Plate");
        const ClosePopUp = document.getElementById("ClosePopUp");
        const submitButton = document.getElementById("submit");
        const ClosePopUpPlate = document.getElementById("ClosePopUpPlate");
        addMenu.addEventListener("click",()=>{
            pop_add_menu.classList.toggle("hidden")
        })
        bgMenu.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        })
        ClosePopUp.addEventListener("click",()=>{
            pop_add_menu.classList.toggle("hidden");
        })
        addPlat.addEventListener("click",()=>{
            pop_add_plate.classList.toggle("hidden")
        })
        ClosePopUpPlate.addEventListener("click",()=>{
            pop_add_plate.classList.toggle("hidden")
        })
    </script>
</body>

</html>