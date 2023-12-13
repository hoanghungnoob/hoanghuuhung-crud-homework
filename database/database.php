<?php
/**
 * Connect to database
 */
$db = null;

function db()
{
    global $db; // Sử dụng biến toàn cục
    $host = 'localhost';
    $database = 'web_a';
    $user = 'root';
    $password = 'mysql';

    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
//
db();
/**
 * Create new student record
 */
function createStudent($name, $age, $email, $image_url)
{
    global $db;

    try {
        // Sử dụng tham số đặc tả để tránh SQL injection
        $query = $db->prepare("INSERT INTO student (name, age, email, profile) VALUES (:name, :age, :email, :image_url)");
        // Gán giá trị từ tham số vào các tham số của câu truy vấn
        $query->bindParam(':name', $name);
        $query->bindParam(':age', $age);
        $query->bindParam(':email', $email);
        $query->bindParam(':image_url', $image_url);
        // Thực hiện truy vấn
        $result = $query->execute();
        return $result;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Error creating student: " . $e->getMessage();
        return false;
    }
}

/**
 * Get all data from table student
 */
function selectAllStudents()
{
    global $db;

    try {
        $query = $db->prepare("SELECT * FROM student");
        $query->execute();

        // Lấy tất cả các dòng kết quả từ truy vấn
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Error selecting students: " . $e->getMessage();
        return false;
    }
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id)
{
    global $db;

    try {
        $query = $db->prepare("SELECT * FROM student Where id = (:id)");
        $query->bindParam(':id',$id);
        $query->execute();

        // Lấy tất cả các dòng kết quả từ truy vấn
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Error selecting students: " . $e->getMessage();
        return false;
    }
}


/**
 * Delete student by id
 */
function deleteStudent($id)
{
    global $db;

    try {
        $query = $db->prepare("DELETE FROM student WHERE id = :student_id");
        $query->bindParam(':student_id', $id);
        
        // Thực hiện truy vấn
        $result = $query->execute();

        return $result;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Error deleting student: " . $e->getMessage();
        return false;
    }
}


/**
 * Update students
 * 
 */
function updateStudent($id, $newValues)
{
    global $db;

    try {
        $query = $db->prepare("UPDATE student SET name = :name, age = :age, email = :email, profile = :image_url WHERE id = :id");

        // Gán giá trị từ mảng mới vào các tham số của câu truy vấn
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $newValues['name']);
        $query->bindParam(':age', $newValues['age']);
        $query->bindParam(':email', $newValues['email']);
        $query->bindParam(':image_url', $newValues['profile']);

        // Thực hiện truy vấn
        $result = $query->execute();

        return $result;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Error updating student: " . $e->getMessage();
        return false;
    }
}

