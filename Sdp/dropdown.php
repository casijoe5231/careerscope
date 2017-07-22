<html>
<body>

    <form method="get" action="http://www.yourwebskills.com/files/examples/process.php">
        
        <select id="cd" name="cd">
        
            <?php
            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="oracle";
            $link=($GLOBALS["___mysqli_ston"] = mysqli_connect(localhost,  $mysqlusername,  $mysqlpassword)) or die ("Error connecting to mysql server: ".mysqli_error($GLOBALS["___mysqli_ston"]));
            
            $dbname = 'careerscope';
            mysqli_select_db( $link, $dbname) or die ("Error selecting specified database on mysql server: ".mysqli_error($GLOBALS["___mysqli_ston"]));
            
            $cdquery="SELECT Goal_name FROM goal_type";
            $cdresult=mysqli_query($GLOBALS["___mysqli_ston"], $cdquery) or die ("Query to get data from firsttable failed: ".mysqli_error($GLOBALS["___mysqli_ston"]));
            
            while ($cdrow=mysqli_fetch_array($cdresult)) {
            $cdTitle=$cdrow["cdTitle"];
                echo "<option>
                    $cdTitle
                </option>";
            
            }
                
            ?>
    
        </select>
        
    </form>
    
</body>
</html>