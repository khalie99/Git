<?php
include 'connect.php';
?>
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container search-table">
            <div class="search-box">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Search All Fields</h5>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Input Keyword">
                        <script>
                            $(document).ready(function () {
                                $("#myInput").on("keyup", function () {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function () {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });
                        </script>
                    </div> 
                </div>
            </div>
            <div class="search-list">
                <!--<h3>303 Records Found</h3>-->
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Text</th>
                            <th>Likes</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php
                        $query = "SELECT * FROM posts";
                        if ($result = $conn->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                                $userID = $row["user_id"];
                                $text = $row["text"];

                        $countlike = "SELECT COUNT(user_id) as count1 FROM post_likes WHERE user_id = $userID";
                        $result1 = $conn->query($countlike);
                        $row1 = $result1->fetch_assoc();
                            $count = $row1["count1"];
                        
                    ?>

                    <tr>
                        <td><?php echo $userID;?></td>
                        <td><?php echo $text;?></td>
                        <td><?php echo $count;?></td>
                    </tr>

                    <?php

                            }
                        }
                    ?>
                    
                    </tbody>
                </table>

            </div>
        </div>