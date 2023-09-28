<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Management</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS Styles -->
    <style>
        body {
            background-color: white;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            max-width: 500px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control,
        .form-select {
            border: 1px solid #ccc;
            color: #333;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
        }

        .btn-primary {
            background-color: #0074D9;
            border: none;
            color: #fff;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .table {
            background-color: #fff;
            color: #333;
            border: 1px solid #ccc;
            width: 100%;
        }

        .table thead th {
            background-color: #0074D9;
            color: #fff;
        }

        .btn-danger {
            background-color: #FF3E3E;
            border: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #FF6565;
        }

        .btn.btn-primary.btn-block {
            background-color: #0074D9;
            border: none;
            color: #fff;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn.btn-primary.btn-block:hover {
            background-color: #0056b3;
        }

        .btn.btn-primary.btn-back {
            background-color: transparent;
            border: 1px solid #0074D9;
            color: #0074D9;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn.btn-primary.btn-back:hover {
            background-color: #0074D9;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Add New Playlist</h2>
        <form action="<?= site_url('music/add_playlist') ?>" method="post">
            <div class="mb-3">
                <label for="playlist_name" class="form-label">Playlist Name:</label>
                <input type="text" name="playlist_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Playlist</button>
        </form>
    </div>

    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Playlist</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($playlist as $playlist): ?>
                    <tr>
                        <td>
                            <?= $playlist['playlist_name'] ?>
                        </td>
                        <td>
                            <a href="<?= site_url('music/delete_playlist/' . $playlist['id']) ?>"
                                class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="container mt-4">
        <a class="btn btn-primary btn-back" href="/music">Go back</a>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
