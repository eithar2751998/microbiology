<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
<p>You have a new contact form submission:</p>

<ul>
    <li><strong>Name:</strong> {{ $data['name'] }}</li>
    <li><strong>Email:</strong> {{ $data['email'] }}</li>
    <li><strong>Message:</strong> {{ $data['message'] }}</li>
</ul>
</body>
</html>
