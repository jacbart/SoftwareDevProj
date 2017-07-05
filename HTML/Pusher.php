 <?php
                      $connect = myqli_connect('localhost', 'root', 'ejc786', 'ThatCSGuide');
                      //this should connect to heroku sql
                      if(!connect){
                        die(mysqli_error($connect).'because'.mysqli_errno($connect));
                      }
                      
                      $query = "select * from resources;"; 
                     
                      $result = mysqli_query($connect, $query);
                      if(!$result){
                        die('Could query data: '.mysqli_error($connection).' because '.mysqli_errno($connection));
                    }                      
                      while ($row = mysqli_fetch_array($result)){
                            if($row['topic_id'] == 3){
                                echo "<tr>
                                        <td>".$row[2]."</td>
                                        <td><a href=".$row[3]."> Link</a></td>
                                </tr>";
                                }
                      }
                mysqli_close($connect);
?>
