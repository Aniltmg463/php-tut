<?php
include '../view/component/header.php';
?>

<section>
<div class="flex justify-end m-2">
    <a href="../view/addCompany.php">
        <button class="bg-green-500 hover:bg-green-600 text-white rounded text-[18px] py-2">
            Add Company
        </button>
    </a>
</div>
    <div class="container py-5">
        <h1 class="text-2xl font-semibold text-center mb-6 text-gray-800">Companies List</h1>
        <table class="w-full text-center">
            <thead>
                <tr>
                    <th class="border p-2">SN</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Address</th>
                    <th class="border p-2">Contact</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../config/dbConn.php';
                $sql = "select * from companies";
                $res = mysqli_query($conn, $sql);
                $count = 1;
                while ($row = mysqli_fetch_assoc($res)) {

                ?>
                    <tr>
                        <td class="border p-2"><?php echo $count++ ?></td>
                        <td class="border p-2"><?php echo $row['name'] ?></td>
                        <td class="border p-2"><?php echo $row['address'] ?></td>
                        <td class="border p-2"><?php echo $row['contact'] ?></td>
                        <td class="border p-2"><?php echo $row['email'] ?></td>

                        <td class="border p-2">
                            <a href="../view/editCompany.php?id=<?= $row['id'] ?>" class="inline-block">
                                <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded mr-2">Edit</button>
                            </a>
                            <a href="../action/deleteCompany.php ?id=<?= $row['id'] ?>" onclick="return confirm('Are You Sure?');" class="inline-block">
                                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }


                ?>

            </tbody>
        </table>
    </div>
</section>

<?php
include '../view/component/footer.php';
?>