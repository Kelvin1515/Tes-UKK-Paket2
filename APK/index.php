<?Php
    require 'function.php';

    $task = query("SELECT * FROM tasks ORDER BY due_date DESC");

    if(isset($_POST['search'])){
        $task = cari($_POST['cari']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> To Do List </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1> To Do List </h1>
        <form action="tambah.php" method="POST">
            <input type="text" name="task_name" id="task_name" placeholder="Task Name" required>
            <select name="status" id="status">
                <option value="Belum Selesai"> Belum Selesai </option>
                <option value="Selesai"> Selesai </option>
            </select>
            <select name="priority" id="priority">
                <option value="Rendah"> Rendah </option>
                <option value="Sedang"> Sexang </option>
                <option value="Tinggi"> Tinggi </option>
            </select>
            <input type="date" name="due_date" id="due_date" required>
            <button type="submit" name="submit"> Tambahkan Task </button>
        </form>
        <form action="" method="POST" class="form-search">
            <input type="text" name="cari" id="cari">
            <button type="submit" name="search"> Cari </button>
        </form>
        <h2> Daftar Tuags </h2>
        <table>
            <tr>
                <th> Task Name </th>
                <th> Status </th>
                <th> Priority </th>
                <th> Tanggal </th>
                <th> Aksi </th>
            </tr>
            <?php

                if(empty($task)){
                    echo '<tr><th colspan= "5"> Data Tidak Ditemukan </tr></th>';
                }

                foreach($task AS $row):
            ?>
            <tr>
                <td><?= $row['task_name'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['priority'] ?></td>
                <td><?= $row['due_date'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>"> Edit | </a>
                    <a href="hapus.php?hapus=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Task Ini?')"> Hapus </a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>