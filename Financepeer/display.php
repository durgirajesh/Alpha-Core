<!DOCTYPE html>
<html>
    <head>
        <title>Table with Database</title>
        <style>
            table {
                boarder-collapse: collapse;
                width: 100%;
                color: #588c7e;
                font-family: monospace;
                font-size: 25px;
                text-align: left; 
            }
            th{
                background-color: #588c7e;
                color: white;
            }
            tr:nth-child(even) {background-color: #f2f2f2}
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>User ID</th>
                <th>ID</th>
                <th>Title</th>
                <th>Text</th>
            </tr>
        <?php
        $server="localhost";
        $username="root";
        $password="";
        $db="financepeer";
        $conn=new mysqli($server,$username,$password,$db);
        if($conn->connect_error){
            die("connection failed".$conn->connect_error);
        }
        $sql = "SELECT userid, id, title, text from users";
        $result = $conn-> query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" .$row["userid"]. "</td><td>" .$row["id"]. "</td><td>" .$row["title"]. "</td><td>" .$row["text"]. "</td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "0 result";
        }
        $conn ->close();
        ?>
        </table>
</html>