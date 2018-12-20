<?php
class Database
{
    private $connect = '';
    public function __construct()
    {
        $this->database_connection();
    }

    public function database_connection()
    {
        $this->connect = new PDO("mysql:host=localhost;dbname=crud-application", "root", "");
    }

    public function fetch_all()
    {
        $query = "SELECT * FROM users ORDER BY user_id";
        $statement = $this->connect->prepare($query);
        if ($statement->execute()) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function insert()
    {
        if (isset($_POST["first_name"])) {
            $form_data = array(
                ':first_name' => $_POST["first_name"],
                ':last_name' => $_POST["last_name"],
                ':email_address' => $_POST["email_address"],
                ':status' => $_POST["status"],
            );
            $query = "
			INSERT INTO users
			(first_name, last_name,email_address,status) VALUES
			(:first_name, :last_name,:email_address,:status)
			";
            $statement = $this->connect->prepare($query);
            if ($statement->execute($form_data)) {
                $data[] = array(
                    'success' => '1',
                );
            } else {
                $data[] = array(
                    'success' => '0',
                );
            }
        } else {
            $data[] = array(
                'success' => '0',
            );
        }
        return $data;
    }

    public function fetch_single($id)
    {
        $query = "SELECT * FROM users WHERE user_id='" . $id . "'";
        $statement = $this->connect->prepare($query);
        if ($statement->execute()) {
            foreach ($statement->fetchAll() as $row) {
                $data['first_name'] = $row['first_name'];
                $data['last_name'] = $row['last_name'];
                $data['email_address'] = $row['email_address'];
                $data['status'] = $row['status'];
            }
            return $data;
        }
    }

    public function update()
    {
        if (isset($_POST["first_name"])) {
            //print_r($_POST);exit;
            $form_data = array(
                ':first_name' => $_POST['first_name'],
                ':last_name' => $_POST['last_name'],
                ':email_address' => $_POST['email_address'],
                ':status' => $_POST['status'],
                ':user_id' => $_POST['user_id'],
            );
            
            $query = "
			UPDATE users
			SET first_name = :first_name, last_name = :last_name,email_address = :email_address,status = :status
			WHERE user_id = :user_id
            ";
            //echo $query;exit;
            $statement = $this->connect->prepare($query);
            if ($statement->execute($form_data)) {
                $data[] = array(
                    'success' => '1',
                );
            } else {
                $data[] = array(
                    'success' => '0',
                );
            }
        } else {
            $data[] = array(
                'success' => '0',
            );
        }
        return $data;
    }
    public function delete($id)
    {
        $query = "DELETE FROM users WHERE user_id = '" . $id . "'";
        $statement = $this->connect->prepare($query);
        if ($statement->execute()) {
            $data[] = array(
                'success' => '1',
            );
        } else {
            $data[] = array(
                'success' => '0',
            );
        }
        return $data;
    }
}
