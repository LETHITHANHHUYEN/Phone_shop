<?php
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'didong') or die('Lỗi kết nối');
mysqli_set_charset($conn, "utf8");
// Dùng isset để kiểm tra Form
if (isset($_POST['signup'])) {
    $username = trim($_POST['uname']);
    $password = trim($_POST['psw']);
    $repassword = trim($_POST['pswrepeat']);
    $email = trim($_POST['eml']);
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($repassword)) {
        array_push($errors, "Password repeat is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";

    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);

    // Nếu kết quả trả về lớn hơn 0 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="../home.php";</script>';

        // Dừng chương trình
        die();
    } else {
        $sql = "INSERT INTO member (username, password, email) VALUES ('$username','$password','$email')";
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="../home.php";</script>';

        if (mysqli_query($conn, $sql)) {
            echo "Tên đăng nhập: " . $_POST['username'] . "<br/>";
            echo "Mật khẩu: " . $_POST['password'] . "<br/>";
            echo "Email: " . $_POST['email'] . "<br/>";
        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../home.php";</script>';
        }
    }
}
