<?php

require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header('Location: index.php#contact');

    exit;

}

$name = trim(
    $_POST['name'] ?? ''
);

$email = trim(
    $_POST['email'] ?? ''
);

$subject = trim(
    $_POST['subject'] ?? ''
);

$message = trim(
    $_POST['message'] ?? ''
);

if (
    $name === '' ||
    $subject === '' ||
    $message === '' ||
    !filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )
) {

    exit(
        'Dữ liệu không hợp lệ.
        <a href="index.php#contact">
        Quay lại
        </a>'
    );

}

$stmt = $conn->prepare(
    "INSERT INTO messages
    (name, email, subject, message)
    VALUES (?, ?, ?, ?)"
);

$stmt->bind_param(
    "ssss",
    $name,
    $email,
    $subject,
    $message
);

if ($stmt->execute()) {

    header(
        'Location: index.php?sent=1#contact'
    );

    exit;

}

http_response_code(500);

echo "Không thể lưu tin nhắn. Vui lòng thử lại sau.";

?>