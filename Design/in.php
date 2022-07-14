
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>

            <?php if($userrole == 1):?> <!-- If Condition For Admin -- > 1 -->
            <th>Update</th>
            <th>Delete</th>
            <?php endif; ?>

        </tr>
        <?php foreach( $data as $user ): ?>  <!-- $data = catch_all_data(); As $user = catch_all_data(); --> 
        <tr>
            <td><?= $user['name']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><img height="50px" src="user_img/<?= $user['img']; ?>"></td> <!--To Show Img In Table-->

            <?php if($userrole == 1):?> <!-- If Condition For Admin -- > 1 -->
            <td><a href="Update_User.php?email=<?= $user['email']?>">UPDATE</a></td>
            <td><a href="Delete_User.php?email=<?= $user['email'];?>">DELETE</a></td>
            <?php endif; ?>

        </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>
