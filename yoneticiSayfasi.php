<?php

// yeni eklenen soruları onaylama gerekirse duzenleme
function soru_düzenle($db,$soru_id){
    
    
}
function soru_onayla($db,$soru_id){
    $sorgu="SELECT"; 
    
}
//onay kolonu 0 olan soruları bul ekrana bas,form aracılıgıyla onayla sonra tekrar bak ve
// sil seceneklerinden birini sec gerekli işlemleri yap

// yeni uyeleri ve rollerini onaylama
function yeni_uye_onayla($db,$uye_id){}
//kullanıcı kayıt sayfasından burayı tetiklemeliyiz.

function uye_duzenle($db,$uye_id){}
//ıstenen uyenın rolunu degıstırme veya askıya alma
function rol_degistir($db,$uye_id){}
//kullanıcı ismine , adı soyadına göre arama yapıp sonuclar içinden gerekeni işaretleme secenegı sunacak, veritabanında gerekli
// yerler değiştirecek fonksiyon

//arama bilgileri form ile alınacak , doldurulan kutulara göre arama yapacak, sonucları ekrana basıp tekrar secım yaptıracak.
function uye_bul(){
    //form ile arama bilgisi al 
}
?>