<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD :  OBJECT ORIENTED PHP , PDO MYSQL WITH AJAX </title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css">

</head>
<body>
<!-- NAVIGATION MENU-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">TheMornStar</a>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">PHP</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">MYSQL</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">AJAX</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       CRUD
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Model</a>
        <a class="dropdown-item" href="#">View</a>
        <a class="dropdown-item" href="#">Controller</a>
      </div>
    </li>
  </ul>
</nav>
<!-- NAVIGATION MENU ENDS -->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <h4 class="text-center text-success font-weight-normal my-3">
          EMAIL LISTING : Annex , Eradicate , Rationalize , Perceive 
         </h4>
         <h6 class="text-center text-danger font-weight-normal my-3">
          CRUD METHODE USING  OBJECT ORIENTED PHP, MVC DESIGN PATTERN  , PHP DATA OBJECT NAMED  MYSQL AND AJAX
         </h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4 class="mt-2 text-primary">All users in Database !</h4>
        </div>
        <div class="col-lg-6">
         <button class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add new user
         </button>
         <a href="action.php?export=excel" class="btn btn-success m-1 float-right"><i class="fa fa-table" aria-hidden="true"></i> Export to Excel</a>
        </div>
  
    </div>
    <hr class="my-1">

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive" id="showUser"> 
              <h3 class="text-center text-success" style="margin-top:150px">Loading...</h3>
            </div>
        </div>
    </div>

</div>

 <!-- Add user Modal -->
 <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header text-center">
          <h4 class="modal-title ">Add new user</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body mx-4">
          <form action="" method="post" id="form-data">
             <div class="form-group">
                <input type="text" name="fname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <input type="submit" name="insert" id="insert" value="Add User" class="btn btn-danger btn-block">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  
 <!-- Edit  Modal -->
 <div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header text-center">
          <h4 class="modal-title ">Add  user</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body mx-4">
          <form action="" method="post" id="edit-form-data">
          <input type="hidden" name="id" id="id">
             <div class="form-group">
                <input type="text" name="fname" class="form-control" id="fname" required>
            </div>
            <div class="form-group">
                <input type="text" name="lname" class="form-control" id="lname" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" id="phone" required>
            </div>
            <div class="form-group">
                <input type="submit" name="update" id="update" value="Update User" class="btn btn-primary btn-block">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <script type="text/javascript">
  $(document).ready(function(){
    
      showAllUsers();
      function showAllUsers(){
          $.ajax({
              url:"action.php",
              type: "POST",
              data: {action:"view"},
              success:function(response){
                 // console.log(response);
                 $("#showUser").html(response);
                 $("table").DataTable({
                    order: [0,'desc']
                 });
              }
          });
      }
      // insert ajax request
      $("#insert").click(function(e){
       if($("#form-data")[0].checkValidity()){
        e.preventDefault();
        $.ajax({
            url: "action.php",
            type:"POST",
            data:$("#form-data").serialize()+"&action=insert",
            success: function(response){
                Swal.fire({
                    title: 'User added Successfully',
                    type: 'success'
                })
                $("#addModal").modal('hide');
                $("#form-data")[0].reset();
                showAllUsers();
            }
        });

       }

      });

      // get user for editing 
      $("body").on("click",".editBtn",function(e){
         e.preventDefault();
          edit_id = $(this).attr('id');
         $.ajax({
          url:"action.php",
          type:"POST",
          data:{edit_id: edit_id},
          success:function (response){
            data = JSON.parse(response);
            $("#id").val(data.id);
            $("#fname").val(data.first_name);
            $("#lname").val(data.last_name);
            $("#email").val(data.email);
            $("#phone").val(data.phone);
            
            
          }
         });
      });

            // update ajax request
      $("#update").click(function(e){
       if($("#edit-form-data")[0].checkValidity()){
        e.preventDefault();
        //var tr  = $(this).closest('tr');
         var id =   $("#edit-form-data #id").val();
         var tableRowId = "tableRowId-"+id;
        $.ajax({
            url: "action.php",
            type:"POST",
            data:$("#edit-form-data").serialize()+"&action=update",
            success: function(response){
                // The Lastly Correction Added by me
                console.log(response);
                $("#"+tableRowId).html(response);

                Swal.fire({
                    title: 'User Updated Successfully',
                    icon: 'success'
                });
                
                $("#editModal").modal('hide');
                $("#edit-form-data")[0].reset();
               // showAllUsers();
            }
        });

       }

      });

      // Delete ajax Request
      $("body").on("click",".delBtn",function(e){
         e.preventDefault();
         var tr  = $(this).closest('tr');
         var del_id =  $(this).attr('id');
         Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.value) {
                        $.ajax({
                            url:"action.php",
                            type:"POST",
                            data:{del_id: del_id},
                            success:function (response){
                              tr.css('background-color','#fff666');
                              Swal.fire(
                                'Deleted!',
                                'User Deleted Successfully.',
                                'success'
                              )
                              showAllUsers();
                            }
                          });

                       
                      }
                    });


  
      });
// Show user Details 

$("body").on("click",".infoBtn",function(e){
  e.preventDefault();
  info_id = $(this).attr('id');
  $.ajax({
    url:"action.php",
    type:"POST",
    data:{info_id:info_id},
    success:function(response){
     // console.log(response);
      var data = JSON.parse(response);
      Swal.fire({
       
       title:'<strong>User Info : ID('+ data.id +')</strong>',
       type:'info',
       html:'<b>First Name: </b>'+ data.first_name +'<br><b>Last Name: </b>'+ data.last_name +'<br><b>Email: </b>'+ data.email +'<br><b>Phone: </b>'+ data.phone +'<br>',
        showCancelButton:true

      });
    }

  });

});

  });
 </script>

</body>
</html>
