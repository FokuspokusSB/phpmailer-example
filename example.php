<?php 

if($_POST && $_POST['name'] && $_POST['email']) {
  include './mail.php';
  $to = 'balkesoeren@googlemail.com';
  $subject = 'testitest';
  $text = 'email ist angekommen - whoool whoop: ' . 
          'name: ' . $_POST['name'] . '\n' .
          'name: ' . $_POST['email'] . '\n' .
          'dabei: ' . $_POST['dabei'];
  if(sendMail($to, $subject, $text)) {
    echo "Erfolgreich verschickt.";
    return;
  } else {
    echo "Ein fehler ist passiert :(";
  }

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="example.php" method="post">
    <label for="">
      name <input type="text" name="name" require="">
    </label>
    <label for="">
      email <input type="text" name="email" require="">
    </label>
    <label for="">
      dabei? <input type="checkbox" name="dabei">
    </label>

    <button type="submit">abschicken</button>
  </form>
  
</body>
</html>