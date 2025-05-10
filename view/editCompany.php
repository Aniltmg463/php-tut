<?php
require "../action/processEditCompany.php"
?>
<section class="mt-5">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-center mb-5">Create Company</h1>
        <form method="post" action="">
            <div class="grid grid-cols-2 gap-4">
                <div class="border p-2">
                    <label for="name">Company Name</label>
                    <input type="text" id="name" name="name" class="w-full border p-2 rounded" value="<?= $name; ?>">
                </div>
                <div class="border p-2">
                    <label for="address">Company Address</label>
                    <input type="text" id="address" name="address" class="w-full border p-2 rounded" value="<?= $address; ?>">
                </div>
                <div class="border p-2">
                    <label for="contact">Company Contact</label>
                    <input type="text" id="contact" name="contact" class="w-full border p-2 rounded" value="<?= $contact; ?>">
                </div>
                <div class="border p-2">
                    <label for="email">Company Email</label>
                    <input type="text" id="email" name="email" class="w-full border p-2 rounded" value="<?= $email; ?>">
                </div>
                <div class="col-span-2 text-center mt-4">
                    <div><input type="hidden" name="id" value=<?= $_GET['id']; ?>></div>
                    <button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include '../view/component/footer.php';
?>