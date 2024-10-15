<?php include("db.php") ?>
<?php include("./includes/header.php") ?>


<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php if (isset($_SESSION["message"])) { ?>

        <div class="alert alert-<?=$_SESSION["message_type"];?> alert-dismissible fade show" role="alert">
          <?= $_SESSION["message"] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php session_unset();
      } ?>
      <div class="card card-body">
        <form action="save-task.php" method="POST">
          <div class="form-group m-2">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group m-2">
            <textarea name="description" class="form-control" placeholder="Task Description" rows="2"></textarea>
          </div>
          <div class="form-group m-2">
            <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include("./includes/footer.php") ?>