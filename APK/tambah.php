<?php
    require 'function.php';

    if(isset($_POST['submit'])){
        if(tambah($_POST) > 0){
            echo 
                '<script>
                    alert("Task Berhasil Di Tambah")
                </script>';
            header('Location: index.php');
        }else{
            echo 
                '<script>
                    alert("Task Gagal Di Tambah")
                </script>';
        }
    }
?>