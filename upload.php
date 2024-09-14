<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    // Faylni tekshirish
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Fayl ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " muvaffaqiyatli yuklandi.";
    } else {
        echo "Faylni yuklashda xatolik yuz berdi.";
    }
} else {
    echo "Faylni yuklash uchun POST so'rovini yuboring.";
}