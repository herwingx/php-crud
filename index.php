<?php include("db.php") ?>
<?php include("./includes/header.php") ?>


<div class="container p-4">
  <div class="row gap-4">
    <div class="col-md-4 px-0">
      <?php if (isset($_SESSION["message"])) { ?>

        <div class="alert alert-<?= $_SESSION["message_type"]; ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION["message"] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php session_unset();
      } ?>
      <div class="card card-body mb-2">
        <form action="save-task.php" method="POST">
          <div class="form-group m-2">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group m-2">
            <textarea name="description" class="form-control" placeholder="Task Description" rows="2"></textarea>
          </div>
          <div class="form-group m-2 text-center">
            <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-7 overflow-x-auto px-0">
      <table class="table table-bordered">
        <thead>
          <tr class="text-center">
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class=text-center>
          <?php
          $query = "SELECT * FROM task";
          $resul_task = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_array($resul_task)) { ?>

            <tr>
              <td><?php echo $row["title"] ?></td>
              <td><?php echo $row["description"] ?></td>
              <td><?php echo $row["created_at"] ?></td>
              <td>
                <a href="edit-task.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary m-1">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="delete-task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger m-1">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>

          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("./includes/footer.php") ?>