<?php

include("../model/connection.php");
include("../controller/header2.php");
if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Service Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/style2.css">
</head>
<body>
  <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <center><h1>Service Management</h1></center>

        <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div>

      </td>
    </tr>
    <tr>
      <td id="table-form">
        <form id="addForm">
          Add New Service : <input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Add Information About Service : <input type="text" id="lname">
          <input type="submit" id="save-button" value="Save">
        </form>
      </td>
    </tr>
    <tr>
      <td id="table-data">
      </td>
    </tr>
  </table>
  <div id="error-message"></div>
  <div id="success-message"></div>
  <div id="modal">
    <div id="modal-form">
      <h2>Edit </h2>
      <table cellpadding="10px" width="100%">
      </table>
      <div id="close-btn">X</div>
    </div>
  </div>

<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // Load Table Records
    function loadTable(){
      $.ajax({
        url : "../model/ajax-load.php",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    loadTable();
    $("#save-button").on("click",function(e){
      e.preventDefault();
      var fname = $("#fname").val();
      var lname = $("#lname").val();
      if(fname == "" || lname == ""){
        $("#error-message").html("All fields are required.").slideDown();
        $("#success-message").slideUp();
      }else{
        $.ajax({
          url: "../model/ajax-insert.php",
          type : "POST",
          data : {first_name:fname, last_name: lname},
          success : function(data){
            if(data == 1){
              loadTable();
              $("#addForm").trigger("reset");
              $("#success-message").html("Data Inserted Successfully.").slideDown();
              $("#error-message").slideUp();
            }else{
              $("#error-message").html("Can't Save Record.").slideDown();
              $("#success-message").slideUp();
            }

          }
        });
      }

    });

    //Delete Records
    $(document).on("click",".delete-btn", function(){
      if(confirm("Do you really want to delete this record ?")){
        var studentId = $(this).data("id");
        var element = this;

        $.ajax({
          url: "../model/ajax-delete.php",
          type : "POST",
          data : {id : studentId},
          success : function(data){
              if(data == 1){
                $(element).closest("tr").fadeOut();
              }else{
                $("#error-message").html("Can't Delete Record.").slideDown();
                $("#success-message").slideUp();
              }
          }
        });
      }
    });

    //Show Modal Box
    $(document).on("click",".edit-btn", function(){
      $("#modal").show();
      var studentId = $(this).data("eid");

      $.ajax({
        url: "../controller/load-update-form.php",
        type: "POST",
        data: {id: studentId },
        success: function(data) {
          $("#modal-form table").html(data);
        }
      })
    });

    //Hide Modal Box
    $("#close-btn").on("click",function(){
      $("#modal").hide();
    });

    //Save Update Form
      $(document).on("click","#edit-submit", function(){
        var stuId = $("#edit-id").val();
        var fname = $("#edit-fname").val();
        var lname = $("#edit-lname").val();

        $.ajax({
          url: "../model/ajax-update-form.php",
          type : "POST",
          data : {id: stuId, first_name: fname, last_name: lname},
          success: function(data) {
            if(data == 1){
              $("#modal").hide();
              loadTable();
            }
          }
        })
      });

    // Live Search
     $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "../controller/ajax-live-search.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     });
  });
</script>
</body>
<?php
		 include "../controller/footer.php";
		 ?>

</html>

