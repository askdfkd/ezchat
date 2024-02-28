<?php
// 数据库连接参数
$servername = "localhost"; // 你的数据库主机名
$username = "root"; // 你的数据库用户名
$password = "20050629d"; // 你的数据库密码
$dbname = "testdb"; // 你的数据库名

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 检查是否接收到了标题和内容
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    // 准备 SQL 语句
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

    // 执行 SQL 语句
    if ($conn->query($sql) === TRUE) {
        echo "新帖子已成功发布<br>";
        echo "标题: " . $title . "<br>";
        echo "内容: " . $content . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// 关闭数据库连接
$conn->close();
?>
