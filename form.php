<?php
session_start();

$mess = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['captcha'])){
        if($_POST['captcha'] == $_SESSION['captcha']){
            $mess = "Каптча введена верно!";
        } else{
            $mess = "Каптча введена неверно!";
        }
    } else{
        $mess = "Расшифруйте каптчу!";
    }
}
?>

<form action="" method="post">
    <p>Введите текст с картинки:</p>
    <img src="captcha.php" alt="captcha" />
    <br>
    <input type="text" name="captcha" required>
    <input type="submit" value="Отправить">
</form>

<?php if($mess): ?>
    <p><?php echo $mess; ?></p>
<?php endif; ?>

