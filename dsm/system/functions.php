<?php

function p($par, $st = false)
{
    if( $st )
    {
        return htmlspecialchars(addslashes(trim(htmlentities($_POST[$par]))));
    }

    return addslashes(trim(htmlentities($_POST[$par])));
}

function g($par)
{
    return strip_tags(trim(addslashes(htmlentities($_GET[$par]))));
}

function kisalt($par, $uzunluk = 50)
{
    if( $uzunluk < strlen($par) )
    {
        $par = mb_substr($par, 0, $uzunluk, "UTF-8") . "[...]";
    }

    return $par;
}

function session_olustur($par)
{
    foreach( $par as $anahtar => $deger )
    {
        $_SESSION[$anahtar] = $deger;
    }
}

function seo($tr1)
{
    $turkce = array( "j", "ş", "Ş", "ı", "ü", "Ü", "ö", "Ö", "ç", "Ç", "ş", "S", "I", "İ", "G", "Ğ", "ğ", "İ", "O", "Ö", "Ç", "C", "Ü", "U", "A", "B", "D", "E", "F", "H", "K", "L", "M", "N", "Z", "Y", "T", "P", "R", "J", "W", "w", " ", "", "," );
    $duzgun = array( "j", "s", "s", "i", "u", "u", "o", "o", "c", "c", "s", "s", "i", "i", "g", "g", "g", "i", "o", "o", "c", "c", "u", "u", "a", "b", "d", "e", "f", "h", "k", "l", "m", "n", "z", "y", "t", "p", "r", "j", "w", "w", "-", "", "" );
    $tr1 = str_replace($turkce, $duzgun, $tr1);
    $tr1 = preg_replace("@[^a-z0-9\\-]+@", "-", $tr1);
    return $tr1;
}
function not_masked_phone($originalPhoneNumber){
    $cleanedPhoneNumber = str_replace(['(', ')', ' ', '-'], '', $originalPhoneNumber);
    return $cleanedPhoneNumber;
}
function whatsapp_no($text) {

    $text = str_replace([' ', '-', '(', ')', '+'], '', $text);

    if (strpos($text, '0') === 0) {
        $text = '9' . $text;
    }

    elseif (strpos($text, '5') === 0) {
        $text = '90' . $text;
    }

    return $text;
}
function Sorgu($sorgu)
{
    global $conn;
    
    return mysqli_query($conn,$sorgu);
}
function Select_sorgu($tablo_name,$kosul,$islem =""){
    $islem = Sorgu("SELECT * FROM $tablo_name WHERE statu ='1' $kosul");
    return $islem;
}
function Sayfalar(){
    $get_sayfalar = Sorgu("SELECT * FROM sayfalar");
    $sayfalar_arr = array();
    foreach($get_sayfalar as $get_sayfa){
        $sayfalar_arr[$get_sayfa['id']] = array('seo_title' => $get_sayfa['seo_title'], 'en_seo_title' => $get_sayfa['en_seo_title'],
        'seo_descriptions' => $get_sayfa['seo_descriptions'], 'en_seo_descriptions' => $get_sayfa['en_seo_descriptions'],
        'seo_link' => $get_sayfa['seo_link'], 'en_seo_link' => $get_sayfa['en_seo_link'], 
        'page_description' => $get_sayfa['page_description'], 'en_page_description' => $get_sayfa['en_page_description']);
    }
    return $sayfalar_arr;
}
function Sonuc($sonuc)
{
    return mysqli_fetch_object($sonuc);
}

function say($say)
{
    return mysqli_num_rows($say);
}

function kod($uzunluk = 8, $buyuk_harf = 1, $kucuk_harf = 1, $sayi_kullan = 1, $ozel_karakter = "")
{
    $buyukler = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $kucukler = "abcdefghijklmnopqrstuvwxyz";
    $sayilar = "0123456789";
    if( $buyuk_harf )
    {
        $seed_length += 26;
        $seed .= $buyukler;
    }

    if( $kucuk_harf )
    {
        $seed_length += 26;
        $seed .= $kucukler;
    }

    if( $sayi_kullan )
    {
        $seed_length += 10;
        $seed .= $sayilar;
    }

    if( $ozel_karakter )
    {
        $seed_length += strlen($ozel_karakter);
        $seed .= $ozel_karakter;
    }

    for( $x = 1; $x <= $uzunluk; $x++ )
    {
        $sifre .= $seed[rand(0, $seed_length - 1)];
    }
    return $sifre;
}

function ip()
{
    if( getenv("HTTP_CLIENT_IP") )
    {
        $ip = getenv("HTTP_CLIENT_IP");
    }
    else
    {
        if( getenv("HTTP_X_FORWARDED_FOR") )
        {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
            if( strstr($ip, ",") )
            {
                $tmp = explode(",", $ip);
                $ip = trim($tmp[0]);
            }

        }
        else
        {
            $ip = getenv("REMOTE_ADDR");
        }

    }

    return $ip;
}

function tarih($par)
{
    $explode = explode(" ", $par);
    $explode2 = explode("-", $explode[0]);
    $zaman = substr($explode[1], 0, 5);
    if( $explode2[1] == "01" )
    {
        $ay = "Ocak";
    }
    else
    {
        if( $explode2[1] == "02" )
        {
            $ay = "Şubat";
        }
        else
        {
            if( $explode2[1] == "03" )
            {
                $ay = "Mart";
            }
            else
            {
                if( $explode2[1] == "04" )
                {
                    $ay = "Nisan";
                }
                else
                {
                    if( $explode2[1] == "05" )
                    {
                        $ay = "Mayıs";
                    }
                    else
                    {
                        if( $explode2[1] == "06" )
                        {
                            $ay = "Haziran";
                        }
                        else
                        {
                            if( $explode2[1] == "07" )
                            {
                                $ay = "Temmuz";
                            }
                            else
                            {
                                if( $explode2[1] == "08" )
                                {
                                    $ay = "Ağustos";
                                }
                                else
                                {
                                    if( $explode2[1] == "09" )
                                    {
                                        $ay = "Eylül";
                                    }
                                    else
                                    {
                                        if( $explode2[1] == "10" )
                                        {
                                            $ay = "Ekim";
                                        }
                                        else
                                        {
                                            if( $explode2[1] == "11" )
                                            {
                                                $ay = "Kasım";
                                            }
                                            else
                                            {
                                                if( $explode2[1] == "12" )
                                                {
                                                    $ay = "Aralık";
                                                }

                                            }

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        }

    }

    return $explode2[2] . " " . $ay . " " . $explode2[0] . ", " . $zaman;
}


/* Giden Mail*/
function yonetici_email($email_icerik){
    if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
        if (!$captcha) {
            if($email_icerik['dil'] == 'en'){
                $email_yanit['mesaj'] = "Please verify that you are not a robot. TRY AGAIN!";
            } else if($email_icerik['dil'] == 'es'){
                $email_yanit['mesaj'] = "Por favor verifica que no eres un robot. ¡INTENTAR OTRA VEZ!";
            } else if($email_icerik['dil'] == 'it'){
                $email_yanit['mesaj'] = "Verifica di non essere un robot. RIPROVA!";
            } else if($email_icerik['dil'] == 'fr'){
                $email_yanit['mesaj'] = "Veuillez vérifier que vous n'êtes pas un robot. RÉESSAYER!";
            } else {
                $email_yanit['mesaj'] = "Lütfen Robot Olmadığınızı Teyit Edin";
            }
        } else {
            include($email_icerik['dosya']);
            $email_yanit = array();
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host     = "mail.laborildam.net";
            $mail->SMTPAuth = true;
            $mail->Username = "sistem@laborildam.net";
            $mail->Password = "EWha65Q4";
            $mail->Port     = 587; 
            $mail->CharSet = 'UTF-8';
            $mail->From = $mail->Username;
            $mail->FromName = $email_icerik['FromName'];
            $mail->AddAddress("cengiz@turkcopper.com");
            $mail->AddAddress("info@turkcopper.com");
            $mail->AddAddress("beyza@turkcopper.com");
            $mail->AddBcc("bahadir@lumossoft.com");
            $mail->Subject = $email_icerik['Subject'];
            $mail->MsgHTML($email_icerik['body']);
            $mail->Send();
            if ($mail->Send()) {
            $email_yanit['durum'] = TRUE;
                if($email_icerik['dil'] == 'en'){
                    $email_yanit['mesaj'] = "Your Information Has Been Taken. THANKS";
                } else if($email_icerik['dil'] == 'es'){
                    $email_yanit['mesaj'] = "Su información ha sido tomada. GRACIAS";
                } else if($email_icerik['dil'] == 'it'){
                    $email_yanit['mesaj'] = "Le tue informazioni sono state prese. GRAZIE";
                } else if($email_icerik['dil'] == 'fr'){
                    $email_yanit['mesaj'] = "Vos informations ont été prises. MERCI";
                } else {
                    $email_yanit['mesaj'] = "Bilgileriniz Alınmıştır. TEŞEKKÜRLER.";
                }
            } else {
                $email_yanit['durum'] = FALSE;
                if($email_icerik['dil'] == 'en'){
                    $email_yanit['mesaj'] = "Your information could not be sent. TRY AGAIN!";
                } else if($email_icerik['dil'] == 'es'){
                    $email_yanit['mesaj'] = "Su información no pudo ser enviada. ¡INTENTAR OTRA VEZ!";
                } else if($email_icerik['dil'] == 'it'){
                    $email_yanit['mesaj'] = "Non è stato possibile inviare le tue informazioni. RIPROVA!";
                } else if($email_icerik['dil'] == 'fr'){
                    $email_yanit['mesaj'] = "Vos informations n'ont pas pu être envoyées. RÉESSAYER!";
                } else {
                    $email_yanit['mesaj'] = "Hata :".error_reporting();
                }
            }
            function reCaptchaControl($captcha){
                $fields = [
                    'secret' => '6Ld87MIhAAAAAD7iOokkbT0k-Bg6dQHCweFU4Uv6',
                    'response' => $captcha
                ];
                $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
                curl_setopt_array($ch,[
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => http_build_query($fields),
                    CURLOPT_RETURNTRANSFER => true
                ]);
                
                $result = curl_exec($ch);
                curl_close($ch);
                return json_decode($result,true);
            }
        }
    
    } else {
        if($email_icerik['dil'] == 'en'){
            $email_yanit['mesaj'] = "Please verify that you are not a robot. TRY AGAIN!";
        } else if($email_icerik['dil'] == 'es'){
            $email_yanit['mesaj'] = "Por favor verifica que no eres un robot. ¡INTENTAR OTRA VEZ!";
        } else if($email_icerik['dil'] == 'it'){
            $email_yanit['mesaj'] = "Verifica di non essere un robot. RIPROVA!";
        } else if($email_icerik['dil'] == 'fr'){
            $email_yanit['mesaj'] = "Veuillez vérifier que vous n'êtes pas un robot. RÉESSAYER!";
        } else {
            $email_yanit['mesaj'] = "Lütfen Robot Olmadığınızı Teyit Edin";
        }
    }
    return $email_yanit;
}

function oturumkontrolana()
{
    $kullanici = $_SESSION["yonetici_kullanici"];
    $sifre = $_SESSION["yonetici_sifre"];
    $oturumkontrol = Sorgu("select * from yonetici where yonetici_kullanici ='" . $kullanici . "' and yonetici_sifre ='" . $sifre . "'");
    $durum = Sonuc($oturumkontrol);
    if( $durum )
    {
    }
    else
    {
        echo "<script language=\"javascript\">window.location=\"index.php\";</script>";
        exit();
    }

}

    $ayarlar = mysqli_query($conn,"SELECT * FROM site_ayar WHERE id ='1'");
    $ayar = mysqli_fetch_array($ayarlar); 

?>
