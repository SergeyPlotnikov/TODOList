<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.05.2016
 * Time: 13:08
 */
include_once "libs/session.php";
include_once "vendor/autoload.php";
include_once "statics/header.php";
include_once "libs/createTodo.php";
?>
<div id="mainContent">
    <div id="head">
        <h2>Create Todo</h2>
    </div>
    <form method="post" action="add_new.php">
        <div id="mainBody" class="addNew">
            <?php
            if (isset($error)) {
                echo "<div class='alert alert-danger' role = 'alert' >$error</div >";
            }
            if (isset($success)) {
                echo "<div class='alert alert-success' role = 'alert' >$success</div >";
            }
            ?>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="desc">Description
                    <small>(Optional)</small>
                </label>
                <textarea class="form-control" name="description" id="desc"></textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due date</label>
                <input type="text" class="form-control" name="due_date" id="due_date">
            </div>

            <div class="form-group">
                <label for="label_under">Label under</label>
                <select class="form-control" name="label_under" id="label_under">
                    <option value="">Select</option>
                    <option value="Inbox">Inbox</option>
                    <option value="ReadLater">Read Later</option>
                    <option value="Important">Important</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="createTodo" id="createTodo" class="btn btn-success" value="Create">
            </div>
        </div>
    </form>
</div>
