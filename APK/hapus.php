<?php
    require 'function.php';

    if(isset($_GET['hapus'])){
        if(hapus($_GET['hapus']) > 0){
            echo 
                '<script>
                    alert("Task Berhasil Di Hapus")
                </script>';
            header('Location: index.php');
        }else{
            echo 
                '<script>
                    alert("Task Gagal Di Hapus")
                </script>';
        }
    }
?>