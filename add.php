<html>
<head>
<style>
        @import "http://fonts.googleapis.com/css?family=Droid+Serif";
        /* Above line is used for online google font */
        
        input {
        width:100%;
        padding:6px;
        margin-top:10px;
        font-size:16px;
        margin-bottom:25px;
        box-shadow:0 0 5px;
        border:none
        }
        #btn {
        width:100%;
        padding:8px;
        margin-top:10px;
        background-color:#474242;
        cursor:pointer;
        color:#fff;
        font-size:18px;
        font-weight:700;
        font-family:'Droid Serif',serif;
        margin-bottom:15px
        }
        #btn:hover {
        background-color:#adadad;
        }

        @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro');
        .header {
          overflow: hidden;
          background-color:rgb(118, 123, 124);
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
          background-color:rgb(66, 69, 70);
          color: white;
        }

        .header a.logo {
          font-size: 25px;
          font-weight: bold;
        }

        .header-right {
          float: right;
        }

        .error {color: #FF0000;}
    </style> 
    <script>
        function validateForm() {
        var x = document.forms["form1"]["nama_pengunjung"].value;
        var y = document.forms["form1"]["alamat"].value;
        var z = document.forms["form1"]["no_HP"].value;
        if (x == "" || x == null) {
            alert("Nama Tidak Boleh Kosong");
            return false;
        }
        else if(y == "" || y == null) {
            alert("Alamat Tidak Boleh Kosong");
            return false;
        }
        else if(z == "" || z == null) {
            alert("Nomor HP Tidak Boleh Kosong");
            return false;
        }
        }
    </script>
    <title>Add Users</title>
</head>

<body bgcolor="#99CCFF">
    <div class="header">
      <a href="#default" class="logo">Guest Book</a>
        <div class="header-right">
          <a href="index.php">Home</a>
          <a class="active" href="add.php">Tambah Data Tamu Baru</a>
        </div>
    </div>

    <form action="add.php" method="post" onsubmit="return validateForm()" name="form1" required>
        <table width="25%" border="0" align="center" style="margin-top: 30px;">
            <tr> 
                <td>Nama Pengunjung :</td>
                <td><input type="text" name="nama_pengunjung"></td>
            </tr>
            <tr> 
                <td>Alamat :</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td>Nomor HP :</td>
                <td><input type="text" name="no_HP"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input id="btn" type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama_pengunjung = $_POST['nama_pengunjung'];
        $alamat = $_POST['alamat'];
        $no_HP = $_POST['no_HP'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO guest(nama_pengunjung,alamat,no_HP) VALUES('$nama_pengunjung','$alamat','$no_HP')");

        if($nama_pengunjung !=''&& $alamat !=''&& $no_HP !='')
        {
            //  To redirect form on a particular page
            header("Location:http://localhost/tugas-pweb/index.php");
        }
        // Show message when user added
        // echo "User added successfully.";
    }
    ?>
</body>
</html>