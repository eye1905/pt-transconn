<!DOCTYPE html>
<html lang="en">
<head>
  <title>PT. Transconn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body>

<div class="container mt-3">
  @yield("content")
  @include("trans.delete")
</div>

</body>

@yield("script")
</html>
