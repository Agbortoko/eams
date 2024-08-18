<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin"), ["error" => "invalidrequest"]);
}
else {

    session_start();

    $attendance = $_POST['attendance'];
    $batchID = $_POST['batchID'];
    $note = $_POST['note'];
    $adminUserID = $_SESSION['loginID'];


    if(empty($batchID) || empty($adminUserID)) {
        redirect(baseUrl("admin"), ["error" => "invalidrequest"]);
     }
    else {

        if(empty($attendance)) {
            redirect(baseUrl("admin/mark_batch_students.php"), ["error" => "emptyfield", "batch_id" => $batchID]);
        }
        else {

            try {
                
                $today = date('Y-m-d');
                // $today = date('c');

                // Check if there is any attendance for today in the database 
    
                $query = "SELECT * FROM attendance WHERE marked_date = '$today' AND batch_id = $batchID";
                $result = mysqli_query($connection, $query);

                if(mysqli_num_rows($result) !== 0) {
                    redirect(baseUrl("admin/mark_batch_students.php"), ["error" => "today_attendance_exist", "batch_id" => $batchID]);
                    
                }else {
    
                    // Get admin id - and save attendance
                    $admin = [];
                    $query = "SELECT id FROM admins WHERE user_id = $adminUserID";
                    $result = mysqli_query($connection, $query);
    
                    if(mysqli_num_rows($result) !== 0) {
                        $admin = mysqli_fetch_assoc($result);
                        $adminID = $admin['id'];
                    }

                    if(isset($note) && count($note) > 0) {

                        foreach($attendance as $student => $status) {
                            // save attendance
                            foreach($note as $id => $info) {

                                if($id == $student) {
                                    $aQuery = "INSERT INTO attendance(admin_id, student_id, batch_id, note, is_present, marked_date) VALUES($adminID, $student, $batchID, '$info' , $status, '$today')";
                                    $aResult = mysqli_query($connection, $aQuery);
                                }

                            }
                        }
                    }
                    else {

                        foreach($attendance as $student => $status) {
                            // save attendance
                            $aQuery = "INSERT INTO attendance(admin_id, student_id, batch_id, is_present, marked_date) VALUES($adminID, $student, $batchID , $status, '$today')";
                            $aResult = mysqli_query($connection, $aQuery);
                             
                        }
                    }
    

                    if($aResult) {
                        redirect(baseUrl("admin/mark.php"), ["success" => "attendance_marked"]);
                        
                    }else {
                        redirect(baseUrl("admin/mark_batch_students.php"), ["error" => "attendance_not_marked", "batch_id" => $batchID]);
                    }
                }


            } catch (\Exception $e) {

                redirect(baseUrl("admin/mark_batch_students.php"), ["error" => "exceptionerror", "batch_id" => $batchID]);
            }

        }

    }
}