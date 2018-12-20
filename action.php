<?php
if (isset($_POST["action"])) {
    $crudUrl = "http://localhost/temp/phpmysqlcrudoperation/api/test_api.php";
    if ($_POST["action"] == 'insert') {
		$form_data = array(
            'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'email_address' => $_POST['email_address'],
			'status' => $_POST['status']
        );
        $api_url = $crudUrl."?action=insert";
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
        $result = json_decode($response, true);
        foreach ($result as $keys => $values) {
            if ($result[$keys]['success'] == '1') {
                echo 'insert';
            } else {
                echo 'error';
            }
        }
    }

    if ($_POST["action"] == 'fetch_single') {
        $id = $_POST["id"];
        $api_url = $crudUrl."?action=fetch_single&id=" . $id . "";
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        echo $response;
    }
    if ($_POST["action"] == 'update') {
        $form_data = array(
            'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'email_address' => $_POST['email_address'],
			'status' => $_POST['status'],
            'user_id' => $_POST['hidden_id'],
		);
		//print_r($form_data);exit;
		$api_url = $crudUrl."?action=update";
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
		$result = json_decode($response, true);
		//echo "<pre>";print_r($result);exit;
        foreach ($result as $keys => $values) {
            if ($result[$keys]['success'] == '1') {
                echo 'update';
            } else {
                echo 'error';
            }
        }
    }
    if ($_POST["action"] == 'delete') {
        $id = $_POST['id'];
        $api_url = $crudUrl."?action=delete&id=" . $id . "";
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        echo $response;
    }
}
