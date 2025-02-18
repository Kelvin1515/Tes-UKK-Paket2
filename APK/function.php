<?php
    $conn = mysqli_connect("localhost", "root", "", "to_do_list");

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function cari($data){

    $query = "SELECT * FROM tasks WHERE task_name LIKE '%$data%' ORDER BY due_date DESC";

    return query($query);
}

function tambah($data){
    global $conn;

    $task_name = htmlspecialchars($data['task_name']);
    $status = htmlspecialchars($data['status']);
    $priority = htmlspecialchars($data['priority']);
    $due_date = htmlspecialchars($data['due_date']);

    $query = "INSERT INTO tasks VALUES ('', '$task_name', '$status', '$priority', '$due_date')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function edit($data){
    global $conn;

    $id = $_GET['id'];
    $task_name = htmlspecialchars($data['task_name']);
    $status = htmlspecialchars($data['status']);
    $priority = htmlspecialchars($data['priority']);
    $due_date = htmlspecialchars($data['due_date']);

    $query = "UPDATE tasks SET task_name = '$task_name', status = '$status', priority = '$priority', due_date = '$due_date' WHERE id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;

    $id = $_GET['hapus'];

    $query = "DELETE FROM tasks WHERE id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>