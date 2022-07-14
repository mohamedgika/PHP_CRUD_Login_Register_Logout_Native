<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <form action="Update_User.php" method="post" enctype="multipart/form-data">
        <pre>
        <label for="name">Username</label>
        <input type="text" name="name" value="<?= $user_data['name']; ?>">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" value="<?= $user_data['email'];?>">
        <br>
        <label for="password">Password</label>
        <input type="text" name="password">
        <br>
        <label for="Presonal_Image">Presonal_Image</label>
        <img name="Presonal_Image" src="user_img/<?= $user_data['img']; ?>">
        <br>
        <label for="img"></label>
        <input type="file" name="img">
        <br>
        <input type="hidden" name="email" value="<?= $user_data['email']; ?>">
        <input type="submit" value="UPDATE">
        </pre>
        </form>
</body>
</html>