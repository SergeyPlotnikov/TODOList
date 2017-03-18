<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 31.05.2016
 * Time: 17:06
 */

include_once "vendor/autoload.php";
include_once "statics/header.php";
include_once "libs/listTodo.php";
include_once "libs/editTodo.php"
?>
<div id="mainContent">
    <div id="head">
        <h2>Edit Todo</h2>
    </div>
    <form method="post" action="edit.php?id=<?= $_GET['id'] ?>">
        <div id="mainBody" class="addNew">
            <?php
            if (isset($error)) {
                echo "<div class='alert alert-danger' role = 'alert' >$error</div >";
            }
            if (isset($success)) {
                echo "<div class='alert alert-success' role = 'alert' >$success</div >";
            }
            ?>

            <?php
            foreach ($listTodo as $td) {
                $givenArray = ["Inbox", "ReadLater", "Important"];
                $selectedArray = array($td['label']);
                $arrayRemaining = array_diff($givenArray, $selectedArray);
                ?>


                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= $td['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Description
                        <small>(Optional)</small>
                    </label>
                    <textarea class="form-control" name="description" id="desc"><?= $td['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="due_date">Due date</label>
                    <input type="text" class="form-control" name="due_date" id="due_date"
                           value="<?= $td['due_date'] ?>">
                </div>

                <div class="form-group">
                    <label for="label_under">Label under</label>
                    <select class="form-control" name="label_under" id="label_under">
                        <?php echo '<option value="' . $td['label'] . '">' . $td['label'] . '</option>';
                        foreach ($arrayRemaining as $item) {
                            echo '<option value="' . $item . '">' . $item . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <div id="seekbar"></div>
                    <div id="progress"><?= $td['progress'] ?>%</div>
                    <input type="hidden" name="progressValue" value="<?= $td['progress'] ?>" id="progressValue">
                </div>

                <div class="form-group">
                    <input type="submit" name="editTodo" id="editTodo" class="btn btn-success" value="Edit">
                </div>
                <?php
            }
            ?>
        </div>
    </form>
</div>
