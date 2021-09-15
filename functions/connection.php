<?php
$conn = mysqli_connect("localhost", "root", "", "vsga") or die("Could not connect: " . mysqli_init());


function insert($data)
{
    global $conn;

    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];

    $image_extension = explode('.', $filename);
    $image_extension = end($image_extension);


    $images = uniqid() . '.' . $image_extension;

    move_uploaded_file($tmpname, "img/" . $images);



    $title = htmlspecialchars(trim($data["title"]));
    $author = htmlspecialchars(trim($data["author"]));
    $publisher = htmlspecialchars(trim($data["publisher"]));
    $category = htmlspecialchars(trim($data["category"]));
    $year = htmlspecialchars(trim($data["year"]));
    $status = htmlspecialchars(trim($data["status"]));

    mysqli_query($conn, "INSERT INTO books VALUES(null, '$title', '$author', '$publisher', '$category', '$year', '$images', '$status')");
    return mysqli_affected_rows($conn);
}

function insertm($data)
{
    global $conn;
    $name = htmlspecialchars(trim(addslashes($data["name"])));
    $s_code = htmlspecialchars(trim(addslashes($data["snumber"])));
    $study = htmlspecialchars(trim(addslashes($data["study"])));
    $adress = htmlspecialchars(trim(addslashes($data["adress"])));
    $gender = htmlspecialchars(trim(addslashes($data["gender"])));

    mysqli_query($conn, "INSERT INTO member VALUES(null, '$name', '$s_code', '$study', '$adress', '$gender')");
    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $email = htmlspecialchars(trim(stripslashes($data["regemail"])));
    $name = htmlspecialchars(trim($data["regname"]));
    $date = $data["regdate"];
    $password = mysqli_real_escape_string($conn, $data["regpassword"]);
    $cpassword = mysqli_real_escape_string($conn, $data["cpassword"]);

    $res = mysqli_query($conn, "SELECT email FROM users WHERE email ='$email'");
    if (mysqli_fetch_assoc($res)) {
        echo "
                <script>alert('Email address has been taken')</script>
            ";
        return false;
    }

    if ($password !== $cpassword) {
        echo "
                <script>alert('Password does not match')</script>
            ";
        return false;
    }


    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES(null,'$email','$name','$date','$password')");
    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;

    $query = "SELECT images FROM books WHERE id = $id";
    $result = mysqli_query($conn, $query);

    mysqli_query($conn, "DELETE FROM books WHERE id = $id");
    foreach ($result as $row) {
        unlink("img/" . $row['images']);
    }

    return mysqli_affected_rows($conn);
}

function deletem($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM member WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id = $data['id'];

    $title = htmlspecialchars(trim($data["title"]));
    $author = htmlspecialchars(trim($data["author"]));
    $publisher = htmlspecialchars(trim($data["publisher"]));
    $category = htmlspecialchars(trim($data["category"]));
    $year = htmlspecialchars(trim($data["year"]));
    $status = htmlspecialchars(trim($data["estatus"]));

    $statusfile = $_FILES['eimage']['error'];


    if ($statusfile == 4 && empty($data['eimage'])) {
        mysqli_query($conn, "UPDATE books SET title='$title', author = '$author', publisher = '$publisher', category = '$category', year = '$year',  status='$status' WHERE id = $id");
        return mysqli_affected_rows($conn);
    } elseif ($statusfile == 0) {
        $filename = $_FILES['eimage']['name'];
        $tmpname = $_FILES['eimage']['tmp_name'];
        $ancientfile = $data["thisimg"];

        $image_extension = explode('.', $filename);
        $image_extension = end($image_extension);

        $images = uniqid() . '.' . $image_extension;

        move_uploaded_file($tmpname, "img/" . $images);

        mysqli_query($conn, "UPDATE books SET title='$title', author = '$author', publisher = '$publisher', category = '$category', year = '$year', images='$images' , status='$status' WHERE id = $id");
        unlink("img/" . $ancientfile);
        return mysqli_affected_rows($conn);
    }

    return mysqli_affected_rows($conn);
}

function editm($data)
{
    global $conn;

    $id = $data['id'];
    $name = htmlspecialchars(trim(addslashes($data["ename"])));
    $s_code = htmlspecialchars(trim(addslashes($data["esnumber"])));
    $study = htmlspecialchars(trim(addslashes($data["estudy"])));
    $adress = htmlspecialchars(trim(addslashes($data["eadress"])));
    $gender = htmlspecialchars(trim(addslashes($data["egender"])));

    mysqli_query($conn, "UPDATE member SET name = '$name', s_code = '$s_code', study = '$study', adress = '$adress', gender = '$gender' WHERE id = $id");
    return mysqli_affected_rows($conn);
}
