<?php
    require 'function.php';

    $id = $_GET['id'];

    $task = query("SELECT * FROM tasks WHERE id = '$id'")[0];

    if(isset($_POST['edit'])){
        if(edit($_POST) > 0){
            echo 
                '<script>
                    alert("Task Berhasil Di Edit")
                </script>';
            header('Location: index.php');
        }else{
            echo 
                '<script>
                    alert("Task Gagal Di Edit")
                </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Task </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2> Edit Task </h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="task_name"> Task Name </label>
            <input type="text" name="task_name" id="task_name" value="<?= $task['task_name'] ?>">
        </div>
        <div class="form-group">
            <select name="status" id="status">
                <option value="Belum Selesai" <?php if($task['status'] == 'Belum Selesai') echo 'selected' ?>> Belum Selesai </option>
                <option value="Selesai" <?php if($task['status'] == 'Selesai') echo 'selected' ?>> Selesai </option>
            </select>
        </div>
        <div class="form-group">
            <select name="priority" id="priority">
                <option value="Rendah" <?php if($task['priority'] == 'Rendah') echo 'sslected' ?>> Rendah </option>
                <option value="Sedang" <?php if($task['priority'] == 'Sedang') echo 'sslected' ?>> Sedang </option>
                <option value="Tinggi" <?php if($task['priority'] == 'Tinggi') echo 'sslected' ?>> Tinggi </option>
            </select>
        </div>
        <div class="form-group">
            <label for="due_date"> Due Date </label>
            <input type="date" name="due_date" id="due_date" value="<?= $task['due_date'] ?>">
        </div>
        <button type="submit" name="edit"> Edit Task </button>
    </form>
    </div>
</body>
</html>