<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Management</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #fff;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .container {
            border-radius: 8px;
            padding: 20px;
            margin: 50px auto; /* Center the container horizontally */
            max-width: 400px; /* Limit the container width */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
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
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Upload Music</h2>
        <form action="<?= site_url('music/upload') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="music_file" class="form-label">Select Music:</label>
                <input type="file" name="music_file" class="form-control" accept=".mp3, .ogg" required>
            </div>
            <div class="mb-3">
                <label for="playlist" class="form-label">Select Playlist:</label>
                <select name="playlist" class="form-select">
                    <option value="none">Select a Playlist</option>
                    <?php if (isset($playlist)): ?>
                        <?php foreach ($playlist as $pl): ?>
                            <option value="<?= $pl['playlist_name'] ?>">
                                <?= $pl['playlist_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Upload</button>
        </form>
        <br>
    <a class="btn btn-primary btn-back" href="/music">Go back</a>

    </div>
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
