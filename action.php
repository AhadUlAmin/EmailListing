<?php 
    require_once 'db.php';
    $db = new Database();
    if(isset($_POST['action']) && $_POST['action'] == "view"){
        $output = '';
        $data = $db->read();
        if($db->totalRowCount()>0){
            $output.='<table class="table table-striped table-sm table-bordered">
            <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-Mail</th>
            <th>Phone</th>
            <th>Action</th>
            </thead>
            <tbody>';
            foreach ($data as $row){
                $output.='<tr class="text-center text-secondary" id="tableRowId-'.$row['id'].'">
                <td>'.$row['id'].'</td>
                <td>'.$row['first_name'].'</td>
                <td>'.$row['last_name'].'</td>
                <td class="email">'.$row['email'].'</td>
                <td>'.$row['phone'].'</td>
                <td>
                &nbsp;&nbsp;
                <a href="#" title="View Details" class="text-success infoBtn"
                id="'.$row['id'].'"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;

                   <a href="#" title="Edit" class="text-primary editBtn"
                   id="'.$row['id'].'" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;

                   <a href="#" title="Delete" class="text-danger delBtn"
                   id="'.$row['id'].'"><i class="fa fa-trash-alt"></i></a>
                </td></tr>

                ';

            }
            $output.='</tbody></table>';
            echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary mt-5">No User in Present in the Database</h3>';
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == "insert"){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $db->insert($fname,$lname,$email,$phone);

    }
    if(isset($_POST['edit_id'])){
        $id = $_POST['edit_id'];
        $row =$db->getUserById($id);
        echo json_encode($row);

    }
    if(isset($_POST['action']) && $_POST['action'] == "update"){
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        echo '<td>'.$id.'</td>
            <td>'.$fname.'</td>
            <td>'.$lname.'</td>
            <td class="email">'.$email.'</td>
            <td>'.$phone.'</td>
            <td>
            &nbsp;&nbsp;
            <a href="#" title="View Details" class="text-success infoBtn"
            id="'.$id.'"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;

            <a href="#" title="Edit" class="text-primary editBtn"
            id="'.$id.'" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;

            <a href="#" title="Delete" class="text-danger delBtn"
            id="'.$id.'"><i class="fa fa-trash-alt"></i></a>
            </td>

            ';
            
        $db->update($id,$fname,$lname,$email,$phone);

    }

    if(isset($_POST['del_id'])){
        $id = $_POST['del_id'];
        $db->delete($id);
    }

    if(isset($_POST['info_id'])){
        $id = $_POST['info_id'];
        $row = $db->getUserById($id);
        echo json_encode($row);
    }

    if(isset($_GET['export']) && $_GET['export'] == "excel" ){
       header("Content-Type:application/xlsx");
       header("Content-Disposition: attachment; filename=users.xlsx");
       header("Pragma: no-cache");
       header("Expires: 0");
       $data = $db->read();
       echo '<table border="1">';
       echo '<tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th></tr>';
        foreach ($data as $row){
            echo '<tr>
                <td>'.$row['id'].' </td>
                <td> '.$row['first_name'].' </td>
                <td> '.$row['last_name'].' </td>
                <td> '.$row['email'].' </td>
                <td> '.$row['phone'].'</td>
                    </tr>

            ';
        }
        echo '</table>';
    }
?>
