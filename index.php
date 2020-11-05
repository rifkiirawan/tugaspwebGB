<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM guest ORDER BY id DESC");
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        table, td, th {  
          border-bottom: 1px solid #ddd;
          text-align: left;
        }

        table {
        border-collapse: collapse;
        width: 80%;
        margin-top: 100px;
        }

        th, td {
        padding: 15px;
        /* border-bottom: 1px solid #ddd; */
        }

        th{
            background-color: lightseagreen;
        }

        td{
          background-color: lightcyan;
        }

        tr:hover {background-color:#f5f5f5;}

        @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro');
        .header {
          overflow: hidden;
          background-color:lightseagreen;
          padding: 20px 10px;
          
        }
        .header a {
          float: left;
          color: black;
          text-align: center;
          padding: 12px;
          text-decoration: none;
          font-size: 18px; 
          line-height: 25px;
          border-radius: 4px;
          font-family: Arial, Helvetica, sans-serif
        }
        .header a:hover {
          background-color: #ddd;
          color: black;
        }

        .header a.active {
          background-color:green;
          color: white;
        }

        .header a.logo {
          font-size: 25px;
          font-weight: bold;
        }

        .header-right {
          float: right;
        }

        .update {
            float: left;
            text-align: center;
            padding: 8px;
            text-decoration: none;
            font-size: 18px; 
            line-height: 25px;
            border-radius: 4px;
            font-family: Arial, Helvetica, sans-serif;
            background-color:green;
            color: white;
            margin-right: 8px;
        }

        .delete {
            float: left;
            text-align: center;
            padding: 8px;
            text-decoration: none;
            font-size: 18px; 
            line-height: 25px;
            border-radius: 4px;
            font-family: Arial, Helvetica, sans-serif;
            background-color:red;
            color: white;
            margin-right: 8px;
        }
    </style>  
    <title>Homepage</title>
</head>

<body>
    <div class="header">
      <a href="#default" class="logo">Guest Book</a>
        <div class="header-right">
          <a class="active" href="index.php">Home</a>
          <a href="add.php">Tambah Data Tamu Baru</a>
        </div>
    </div>

    <table align="center">

    <tr>
        <th>Nama Pengunjung</th> <th>Nomor HP</th> <th>Alamat</th> <th>Tanggal Berkunjung</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nama_pengunjung']."</td>";
        echo "<td>".$user_data['no_HP']."</td>";
        echo "<td>".$user_data['alamat']."</td>";
        echo "<td>".substr($user_data['tgl_berkunjung'],-2)."-".substr($user_data['tgl_berkunjung'],5,2)."-".substr($user_data['tgl_berkunjung'],0,4)."</td>";    
        echo "<td><a class='update' href='edit.php?id=$user_data[id]'>Edit</a> <a class='delete' href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>