<?php
include "connect.php";
?>
<link href="bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="bootstrap/3.3.0/css/style.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="jquery/3.3.0/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="admin.php">
                       Administrator
                    </a>
                </li>
                <li> 
                    <a href="admin.php">Home</a>
                </li>
                <li>
                    <a href="register.php">Add User</a>
                </li>
                <li>
                    <a href="item.php">Item</a>
                </li>
                <li>
                    <a href="#">Inventory</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1>Item</h1>
    <!------------------------------LAYOUT 2---------------------------------------->
    
<link href="bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="twitter-bootstrap/2.3.2/css/style.css">
<script src="bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="icon/icon.css">
<link rel="stylesheet" href="font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
<script src="ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>



<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Item Description</th>
                        <th>Barcode</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                <?php
                $sql="SELECT * FROM item";
                if ($result = $conn->query($sql)) {
                    while ($row = $result->fetch_assoc()) {
                        $item=$row["item_name"];  
                        $item_desc=$row["item_desc"];
                        $barcode=$row["barcode"];

                        ?>
                    <td><?php echo $item;?></td>
                    <td><?php echo $item_desc;?></td>
                    <td><?php echo $barcode;?></td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>
                    </td>
                <?php
                    }
                }
                        ?>
                </tbody>
            </table>
        </div>
    </div>    

    <!------------------------------LAYOUT 2---------------------------------------->
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
<!-------------------------------LAYOUT--------------------------------------->
<script type="text/javascript">
    $(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});
</script>
<!-------------------------------LAYOUT--------------------------------------->

<!-------------------------------INSERT FORM--------------------------------------->
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var actions = $("table td:last-child").html();
    // Append table with add row form on add new button click
    $(".add-new").click(function(){
        $(this).attr("disabled", "disabled");
        var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
            '<td>' + actions + '</td>' +
        '</tr>';
        $("table").append(row);     
        $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
    // Add row on add button click
    $(document).on("click", ".add", function(){
        var empty = false;
        var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
            if(!$(this).val()){
                $(this).addClass("error");
                empty = true;
            } else{
                $(this).removeClass("error");
            }
        });
        $(this).parents("tr").find(".error").first().focus();
        if(!empty){
            input.each(function(){
                $(this).parent("td").html($(this).val());
            });         
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").removeAttr("disabled");
        }       
    });
    // Edit row on edit button click
    $(document).on("click", ".edit", function(){        
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
            $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
        });     
        $(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new").attr("disabled", "disabled");
    });
    // Delete row on delete button click
    $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });
});
</script>
<!-------------------------------INSERT FORM--------------------------------------->