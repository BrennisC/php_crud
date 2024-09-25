<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($cont, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $descriptions = $row['descriptions'];
    }
}
?>

<?php include("./includes/header.php") ?>


<div class="container p-4">
    <div class="grid">
        <div class="col-12">

            <div class="row">
                <form action="save_task.php?id=<?= $id ?>" method="post">
                    <div class="col-12">
                        <input type="text" name="title" value="<?= $title ?>" class="form-control" placeholder="Title" autofocus>
                    </div>
                    <div class="col-12">
                        <textarea name="description" class="form-control" placeholder="Description"><?= $descriptions ?></textarea>
                    </div>
                    <input type="submit" value="Save" class="btn btn-primary" name="save_task">
                </form>
            </div>

        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>

</html>