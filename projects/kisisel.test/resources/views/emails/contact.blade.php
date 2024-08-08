<!DOCTYPE html>
<html>
<head>
    <title>İletişim Mesajı</title>
</head>
<body>
<h2>Yeni İletişim Mesajı</h2>
<p><strong>Adı:</strong> {{ $data['name'] }}</p>
<p><strong>E-posta:</strong> {{ $data['email'] }}</p>
<p><strong>Mesajı:</strong> {{ $data['message'] }}</p>
</body>
</html>
