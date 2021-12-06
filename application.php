<?php

class Application {

    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $database_name = 'blood_donation';
        $db_connect = mysqli_connect($host_name, $user_name, $password);

        if ($db_connect) {
            $db_select = mysqli_select_db($db_connect, $database_name);
            if ($db_select) {
                // echo 'Database is Selected';
                return $db_connect;
            } else {
                die("Sorry Database is not selected." . mysqli_error($db_connect));
            }
        } else {
            die("Sorry Database is not connected." . mysqli_error($db_connect));
        }
        session_start();
    }

//****#####--Common Method Function start--####***
    public function getOneCol($col, $tbl, $comCol, $comVal) {
        $db_connect = $this->__construct();

        $sql = "SELECT $col FROM $tbl WHERE $comCol='$comVal' ";
        if (mysqli_query($db_connect, $sql)) {
            $result = mysqli_query($db_connect, $sql);
            $row = mysqli_fetch_array($result);
            return $row[$col];
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function execute_query($sql) {
        $db_connect = $this->__construct();

        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function fetchRows($sql) {
        $db_connect = $this->__construct();
        $arr = array();
        if (mysqli_query($db_connect, $sql)) {
            $res = mysqli_query($db_connect, $sql);
            while ($row = mysqli_fetch_array($res)) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Common Method Function End--####***
    public function getTotalRows($sql) {
        $db_connect = $this->__construct();

        if (mysqli_query($db_connect, $sql)) {
            $res = mysqli_query($db_connect, $sql);
            $NUM = mysqli_num_rows($res);
            return $NUM;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Admin Login Function Start--####***
//****#####--Select Active User Type Function start--####***
    public function select_donation_organization_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_organization` WHERE deletion_status = '0'";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select Active User Type Function End--####***
//****#####--Save User Type Function Start--####***
    public function save_appoinment_info($data) {
        $db_connect = $this->__construct();

        $content = $data[content];
        $infoContent = htmlentities($content);
        $entity_elm1 = mysqli_real_escape_string($db_connect, $infoContent);

        $sql = "INSERT INTO `tbl_appoinment_request` (name,email_address,mobile_number,organization_id,appoint_date,appoint_time,content) VALUES ('$data[name]','$data[email_address]','$data[mobile_number]','$data[organization_id]','$data[appoint_date]','$data[appoint_time]','$entity_elm1')";

        if (mysqli_query($db_connect, $sql)) {
            $_SESSION["message"] = 'Appoinment Successfully';
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Save User Type Function End--####***
//****#####--Select Active User Type Function start--####***
    public function select_active_comment_info($string) {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_comment` WHERE status_id = '$string' order by id desc limit 3";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select Active User Type Function End--####***
//****#####--Select Active User Type Function start--####***
    public function select_slider_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_slider` WHERE deletion_status = 0 order by id desc limit 3";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select Active User Type Function End--####***
//****#####--Select Active User Type Function start--####***
    public function select_all_blood_group_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_blood_group` WHERE deletion_status = '0'";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select Active User Type Function End--####***
//****#####--Select User Type Function Start--####***
    public function select_all_varsity_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_varsity_name` WHERE deletion_status= 0 ";
        $query_result = mysqli_query($db_connect, $sql);
        if ($query_result) {
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select User Type Function End--####***
//****#####--Select User Type Function Start--####***
    public function select_all_city_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_city` WHERE deletion_status= 0 ";
        $query_result = mysqli_query($db_connect, $sql);
        if ($query_result) {
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select User Type Function End--####***
//****#####--Select User Type Function Start--####***
    public function select_all_location_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_location` WHERE deletion_status= 0 ";
        $query_result = mysqli_query($db_connect, $sql);
        if ($query_result) {
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select User Type Function End--####***
//****#####--Select Active Company Function Start--####***
    public function select_all_donor_info($city_id, $varsity_id, $blood_group, $location_id) {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_blood_donor` WHERE city_id = '$city_id' AND varsity_name = '$varsity_id' AND blood_group = '$blood_group' AND location_id = '$location_id'  ORDER BY id DESC ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select Active Company Function End--####***
    public function sendSMS($from, $sms, $to) {

        $user = urlencode('hairlife285');
        $password = urlencode('tNMxIdDj');
        $sender = urlencode($from);
        $sms = urlencode($sms);
        $to = urlencode($to);

        $api_params = '?user=' . $user . '&password=' . $password . '&sender=' . $sender . '&SMSText=' . $sms . '&GSM=' . $to;
        $smsGatewayUrl = "http://app.planetgroupbd.com/api/sendsms/plain";
        $smsgatewaydata = $smsGatewayUrl . $api_params;
        $url = $smsgatewaydata;

        $ch = curl_init();                       // initialize CURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0');
        //curl_setopt($ch, CURLOPT_INTERFACE, "eaccountbook.com/send_sms.php"); // telling the remote system where to send the data back
        //curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)"); // pretend you are IE/Mozilla in case the remote server expects it
        curl_setopt($ch, CURLOPT_POST, 1); // setting as a post

        $output = curl_exec($ch);
        curl_close($ch); // Close CURL
// Use file get contents when CURL is not installed on server.
        if (!$output) {
            $output = file_get_contents($smsgatewaydata);
        }
        return $output;
    }

//****#####--Save User Type Function Start--####***
    public function save_blood_request_info($data) {
        $db_connect = $this->__construct();

        $date = date('d-m-Y', strtotime($_POST['need_date']));
        $pre = '88';
        $mobile = $_POST['mobile_number'];
        ;
        $mobile_number = $pre . $mobile;
        $name = $data[patient_name];
        $sql = "INSERT INTO `tbl_blood_request` "
                . "(patient_name,"
                . "blood_group,"
                . "patient_age,"
                . "blood_qty,"
                . "mobile_number,"
                . "line_number,"
                . "email_address,"
                . "hispital_name,"
                . "location_id,"
                . "present_address,"
                . "purpose,"
                . "need_date) "
                . "VALUES ('$data[patient_name]',"
                . "'$data[blood_group]',"
                . "'$data[patient_age]',"
                . "'$data[blood_qty]',"
                . "'$mobile_number',"
                . "'$data[line_number]',"
                . "'$data[email_address]',"
                . "'$data[hispital_name]',"
                . "'$data[location_id]',"
                . "'$data[present_address]',"
                . "'$data[purpose]',"
                . "'$date')";
        $query_result = mysqli_query($db_connect, $sql);
        if ($query_result) {

            $sms = "Dear " . $name . " Thank you for your request in Blood Donation Center. We will contact with you as soon as possible.";
            $msg = $this->sendSMS('Hairlife', $sms, $mobile_number);
            if ($msg) {
                $_SESSION['message'] = "Request Save Successfully";
                header('Location: blood_request.php');
                exit();
            }
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Save User Type Function End--####***
//****#####--Select Active User Type Function start--####***
    public function select_donation_process_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_donation_process` WHERE deletion_status = '0'";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }
//****#####--Select Active User Type Function End--####***
//****#####--Select User Type Function Start--####***
    public function select_all_gallery_image_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_gallery` WHERE deletion_status= 0 order by id DESC LIMIT 8";
        $query_result = mysqli_query($db_connect, $sql);
        if ($query_result) {
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }


    public function select_all_sponsor_image_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_sponsor` WHERE deletion_status= 0 order by id DESC LIMIT 8";
        $query_result = mysqli_query($db_connect, $sql);
        if ($query_result) {
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }
//****#####--Select User Type Function End--####***
//****#####--Select User Type Function Start--####***
    public function select_all_campaign_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_campaign` WHERE deletion_status= 0 order by id DESC LIMIT 8";
        $query_result = mysqli_query($db_connect, $sql);
        if ($query_result) {
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select User Type Function End--####***
//****#####--Select User Type Function Start--####***
    public function select_all_single_campaign_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_campaign` WHERE deletion_status= 0 order by id DESC LIMIT 1";
        $query_result = mysqli_query($db_connect, $sql);
        if ($query_result) {
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select User Type Function End--####***
//****#####--Select Active User Type Function start--####***
    public function select_donor_opinion_info() {
        $db_connect = $this->__construct();

        $sql = "SELECT * FROM `tbl_user_opinion` WHERE deletion_status = 0 order by id desc limit 3";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

//****#####--Select Active User Type Function End--####***
}
