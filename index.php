<?php include("db.php") ?>

<?php include("./includes/header.php") ?>

<div class="container">
    <div class="grid">
        <div class="col-12">
            <?php if (isset($_SESSION["message"])) { ?>
                <div class="alert alert-<?= $_SESSION["message_type"] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION["message"]; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span">
                    </button>
                </div>

            <?php session_unset();
            }  ?>

            <div class="row">
                <form action="save_task.php" method="post">
                    <div class="col-12">
                        <input type="text" name="title" class="form-control" placeholder="Title" autofocus>
                    </div>
                    <div class="col-12">
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <input type="submit" value="Save" class="btn btn-primary" name="save_task">
                </form>
            </div>
        </div>

        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider ">
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($cont, $query);

                    while ($row = mysqli_fetch_array($result_tasks)) { ?>

                        <tr class="table-active">
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['descriptions'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning ml-2"><i class="fas fa-edit">Edit</i></a>
                                <a href="delete_task.php?id=<?= $row['id'] ?>" class="btn btn-danger ml-2"><i class="fas fa-trash-alt">Delete</i></a>
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>

</html>