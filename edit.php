<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $nama_pengunjung=$_POST['nama_pengunjung'];
    $no_HP=$_POST['no_HP'];
    $alamat=$_POST['alamat'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE guest SET name='$nama_pengunjung',alamat='$alamat',no_HP='$no_HP' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM guest WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama_pengunjung = $user_data['nama_pengunjung'];
    $alamat = $user_data['alamat'];
    $no_HP = $user_data['no_HP'];
}
?>
<html>
<head>
    <style>
        @import "http://fonts.googleapis.com/css?family=Droid+Serif";
        /* Above line is used for online google font */
        h2 {
        text-align:center
        }
        hr {
        margin-bottom:-10px
        }
        span {
        color:red;
        margin-left:65px
        }
        div.main {
        width:960px;
        height:655px;
        margin:50px auto;
        font-family:'Droid Serif',serif
        }
        div.first {
        width:380px;
        height:570px;
        float:left;
        padding:15px 50px;
        background:#f8f8ff;
        box-shadow:0 0 10px gray;
        margin-top:20px
        }
        input {
        width:100%;
        padding:8px;
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
        border:2px solid #adadad;
        font-size:18px;
        font-weight:700;
        font-family:'Droid Serif',serif;
        margin-bottom:15px
        }
        #btn:hover {
        background-color:#adadad;
        border:2px solid #474242
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
        var x = document.forms["update_user"]["nama_pengunjung"].value;
        var y = document.forms["update_user"]["alamat"].value;
        var z = document.forms["update_user"]["no_HP"].value;
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
    <title>Edit User Data</title>
</head>

<body bgcolor="#99CCFF">
<div class="header">
      <a href="#default" class="logo">Guest Book</a>
        <div class="header-right">
          <a class="active" href="index.php">Home</a>
        </div>
    </div>

    <form name="update_user" method="post" action="edit.php" onsubmit="return validateForm()">
        <table width="25%" border="0" align="center" style="margin-top: 30px;">
            <tr> 
                <td>Nama Pengunjung</td>
                <td><input type="text" name="nama_pengunjung" value=<?php echo $nama_pengunjung;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr> 
                <td>Nomor HP</td>
                <td><input type="text" name="no_HP" value=<?php echo $no_HP;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>