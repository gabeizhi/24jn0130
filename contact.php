<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    $date = date("Y-m-d H:i:s");

    $data = [$date, $name, $email, $message];

    $file = fopen('data.csv', 'a');
    fputcsv($file, $data);
    fclose($file);

    echo "<!DOCTYPE html><html lang='ja'><head><meta charset='UTF-8'><title>送信完了</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'></head><body class='container py-5 text-center'>";
    echo "<h1>お問い合わせありがとうございました</h1>";
    echo "<p class='lead'>内容は正常に記録されました。</p>";
    echo "<a href='index.html' class='btn btn-primary'>トップへ戻る</a>";
    echo "</body></html>";
} else {
    header("Location: index.html");
    exit();
}
?>