<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.05.2016
 * Time: 11:51
 */
include "vendor/autoload.php";
include_once "statics/header.php";
include_once "libs/listTodo.php";
include_once "libs/delete.php";
?>

<div id="mainContent">
    <div id="head" class="clearfix">
        <h2>Manage Todo</h2>
        <div id="add_more">
            <a href="add_new.php" class="btn btn-success">+ Add New</a>
        </div>
    </div>
    <div id="mainBody">

        <table class="table table-striped">
            <thead>
            <tr>
                <td>Title</td>
                <td>Snippet</td>
                <td>Due Date</td>
                <td>Time Left</td>
                <td>Progress</td>
                <td>Actions</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($listTodo !== 0) {
                foreach ($listTodo as $key => $value) {
                    echo '<tr>';
                    $today = strtotime('now');
                    $due_date = strtotime($value['due_date']);
                    if ($due_date > $today) {
                        $hours = ($due_date - $today) / 3600;
                        $timeLeft = $hours / 24;
                        if ($timeLeft < 1) {
                            $timeLeft = 'Less then 1 day';
                        } else {
                            $timeLeft = round($timeLeft) . ' days remaining';
                        }
                    } else {
                        $timeLeft = 'Expired';
                    }
                    ?>
                    <td><?= $value['title'] ?></td>
                    <td><?= $value['description'] ?></td>
                    <td><?= $value['due_date'] ?></td>
                    <td><?= $timeLeft ?></td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                 aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                                 style="width: <?= $value['progress'] ?>%">

                            </div>
                        </div>
                    </td>
                    <td><a href="edit.php?id=<?= $value['id'] ?>" title="<?= $value['title'] ?>">edit </a>|
                        <a href="index.php?delete=<?= $value['id'] ?>" title="<?= $value['title'] ?>">delete </a>
                    </td>
                    <?php
                }
            } else {
                echo '<td></td><td></td><td>Sorry, no more todo under this section. </td><td></td><td></td><td></td>';
            }
            echo '</tr>';
            ?>

            </tbody>
        </table>
    </div>
</div>
</div>

</div>
</body>
</html>
