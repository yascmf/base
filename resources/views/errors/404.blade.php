<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Not Found!</title>
</head>
<body style="font-family:'Courier New', Courier, monospace; text-align: center;">
    <h1>404 Not Found!<h1>
    <p style="font-size: 16px;">Go To <a href="http://{{ request()->header('HOST') }}" style="color: #999;">{{ request()->header('HOST') }}</a></p>
    <p style="font-size:14px;">powered by <a href="http://www.yascmf.com" style="color: #333;">YASCMF</a></p>
</body>
</html>