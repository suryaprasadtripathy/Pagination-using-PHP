<!doctype HTML>
<html>
    <head> <title> P A G I N A T I O N </title>
    <style>
        body { margin:0; padding: 0; background-image:url("1.jpg");
               background-repeat:no-repeat; background-size:cover; font-family:'Noto Sans'; color:black; }

        h1 { margin:0; padding:0; position:absolute; 
                left:50%; top:5%;  transform: translate(-50%,-50%);}
    </style>
    </head>

    <body>
        <center>
        <h1>   
             P A G I N A T I O N
        </h1>
               <br><br><br><br>
        <?php
			include 'database.php';
            $results_per_page=3;
			$str="select * from record";
			$result=mysqli_query($con,$str);
            $resultsno=mysqli_num_rows($result);

            $pagenos= ceil($resultsno/$results_per_page);

            if(!isset($_GET['page']))
                { $page=1; }
             else
                { $page=$_GET['page'];}
                
                $range=($page-1)*$results_per_page;
                
                $str="select * from record LIMIT ".$range.','.$results_per_page;
                $result=mysqli_query($con,$str);
               if((mysqli_num_rows($result))>0)
                {
                          echo '<center><table border="10" width=80% cellpadding="10"></td>';
				          echo  '<tr>
                                <td style="color:#000;"><center><b>#SL.no</b></center></td>
						        <td style="color:#000;"><center><b>Name</b></center></td>
					        	<td style="color:#000;"><center><b>Age</b></center></td>
					        	<td style="color:#000;"><center><b>Email</b></center></td>
                                </tr>';
                        while($row=mysqli_fetch_array($result))
				        {  
					        echo '<tr><td style="color:#000;"><center>'.$row[0].'</center></td><td style="color:#000;"><center>'.$row[1].'</center></td><td style="color:#000;"><center>'.$row[2].'</center></td><td style="color:#000;"><center>'.$row[3].'</center></td></tr>';
                        }
                        echo '</table>';
                        echo '<br> <br>';
                }
            /*  if($page > 1)              
                echo '<a href="index.php?page='.($page-1).'" style="text-decoration:none;"> <button style="padding:6px 8px;"> Prev </button> </a> &nbsp;';
                
                if($page < $pagenos)
                echo '<a href="index.php?page='.($page+1).'" style="text-decoration:none;"> <button style="padding:6px 8px; right=20%"> Next </button> </a>&nbsp;';
            */   
                for($page=1; $page<=$pagenos; $page++)
                {  echo '<a href="index.php?page=' .$page. '" style="text-decoration:none;padding:6px 8px;color:white;background-color:#ff1744; border-radius:5px; border:solid #ff1744;">' .$page. '</a>&nbsp;';  } 
        ?>
        </center><br>

        <form method="post" action="insert.php">
            <table>
                <tr> <td> Name: &nbsp; <input type="text" name="name" required /> </td> </tr>
                <tr> <td> Age: &nbsp;&emsp; <input type="age" name="age" required /> </td> </tr>
                <tr> <td> Email: &nbsp;&nbsp; <input type="email" name="email" required /> </td> </tr>
            </table><br>
            <center> <input type="submit" name="submit" value="Submit"> &nbsp; <input type="reset"  value="Reset"> </center>
        </form>
        </center>
    <body>
</html>