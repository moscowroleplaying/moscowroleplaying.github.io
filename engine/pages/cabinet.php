<?php
    function generateCode($length=6) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }

 // print_r();
 require("../config.php");
 //require("../mysql.php");
 require("../recaptchalib.php");

 $db = new PDO('mysql:host=' . $config['mysql_host'] . ';dbname=' . $config['mysql_database'], $config['mysql_user'], $config['mysql_pass']);
 $text__ = "Необходима авторизация!";

 if(isset($_POST['postlog_in']))
 {
     $login = $_POST['postnickname'];
     $password = $_POST['postpassword'];
     $secret = $config['google_captcha_secretkey'];
     $response = null;
     $reCaptcha = new ReCaptcha($secret);
     if ($_POST["g-recaptcha-response"]) $response = $reCaptcha->verifyResponse( $_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
     if ($response != null && $response->success) //Добавить ! перед $response->success , если на своем пк запустили сайт
     {
        $query = sprintf('SELECT * FROM `%s` WHERE `%s` = :user_name', $config['table_account'], $config['field_name']);
        $stmt = $db->prepare($query); 
        $stmt->execute(array('user_name' => $login));
        $data = $stmt->fetchAll();
        if(isset($data[0][$config['field_name']]))
        {
            if($password == $data[0][$config['field_password']])
            {
                $hash = md5(generateCode(10));
                $ipc = $_SERVER['REMOTE_ADDR'];
                
                $sql = "INSERT INTO session (`id`, `nick`, `hash`, `ip`) VALUES ('', :login, :hash, :ip)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':login', $login, PDO::PARAM_STR);       
                $stmt->bindParam(':hash', $hash, PDO::PARAM_STR); 
                $stmt->bindParam(':ip', $ipc, PDO::PARAM_STR); 
                $stmt->execute(); 
                
                setcookie("nick", $login, time()+60*60*24*30);
                setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); // httponly !!!
                    
                $text__ = "Вы успешно авторизовались. Перенаправление..";
                
                header("Refresh:2");
            } else $text__ = "Неверный пароль!";
        } else $text__ = "Аккаунт с таким именем не обнаружен";
     } else $text__ = "Пройдите Google Recaptcha!";
 }

 if(isset($_COOKIE['nick']) && isset($_COOKIE['hash']) && !isset($_POST['postlog_in']))
 {
     $login = $_COOKIE['nick'];
     $hash = $_COOKIE['hash'];
     $stmt = $db->prepare('SELECT * FROM `session` WHERE `nick` = :user_name AND `hash` = :hash'); 
     $stmt->execute(array('user_name' => $login, 'hash' => $hash));
     $data = $stmt->fetchAll();
     if(isset($data[0]['id']))
     {
        if(isset($_GET['logout']))
        {
            $sql = "DELETE FROM session WHERE nick=':login'";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':login', $login, PDO::PARAM_INT);   
            $stmt->execute();
            setcookie("nick", "", time() - 3600);
            setcookie("hash", "", time() - 3600);
            header("Refresh:1");
        } else {
            $query = sprintf('SELECT * FROM `%s` WHERE `%s` = :user_name', $config['table_account'], $config['field_name']);
            $stmt = $db->prepare($query); 
            $stmt->execute(array('user_name' => $login));
            $data = $stmt->fetchAll();

            $number_acc = $data[0][$config['field_ID']];
            $level = $data[0][$config['field_level']]; 
            $exp = $data[0][$config['field_exp']]; 
            $money = $data[0][$config['field_money']]; 
            $bank = $data[0][$config['field_bank']]; 
            if($data[0][$config['field_gender']]) $gender = "Мужской"; 
            else $gender = "Женский";
            if($data[0][$config['field_house']] == -1) $house = "Нет";
            else $house = $data[0][$config['field_house']];
            if($data[0][$config['field_business']] == -1) $business = "Нет";
            else $business = $data[0][$config['field_business']];
            if($data[0][$config['field_hotel']] == -1) $hotel = "Нет";
            else $hotel = $data[0][$config['field_hotel']];
            $warns = $data[0][$config['field_warns']]; 
            $donate = $data[0][$config['field_donate']]; 

             $template = 
         str_replace(array(
                '{%forum%}',
                '{%nameproject%}',
                '{%isclass%}'
            ),
            array(
                $config['forum'],
                $config['_name_project_'],
                ''
            ),
            file_get_contents('../../templates/header.tpl')) .
            str_replace(array(
                '{%login%}',
                '{%numberacc%}',
                '{%level%}',
                '{%exp%}',
                '{%money%}',
                '{%bank%}',
                '{%gender%}',
                '{%house%}',
                '{%business%}',
                '{%hotel%}',
                '{%warns%}',
                '{%donate%}'
            ),
            array(
                $login,
                $number_acc,
                $level,
                $exp,
                $money,
                $bank,
                $gender,
                $house,
                $business,
                $hotel,
                $warns,
                $donate
            ),
            file_get_contents('../../templates/cabinet.tpl')) .
            str_replace(array(
                '{%forum%}',
                '{%group%}',
                '{%nameproject%}',
                '{%ip%}',
                '{%port%}',
                '{%youtube%}'
            ),
            array(
                $config['forum'],
                $config['vk'],
                $config['_name_project_'],
                $config['_ip_'],
                $config['_port_'],
                $config['youtube']
            ),
            file_get_contents('../../templates/footer.tpl'));
         }
     } else {
         setcookie("nick", "", time() - 3600);
         setcookie("hash", "", time() - 3600);
         header("Refresh:1");
     }
} else {
    $template = 
     str_replace(array(
			'{%forum%}',
            '{%nameproject%}',
            '{%isclass%}'
		),
		array(
			$config['forum'],
            $config['_name_project_'],
            ''
		),
		file_get_contents('../../templates/header.tpl')) .
		str_replace(array(
			'{%google_captcha_key%}',
            '{%t%}'
		),
		array(
			$config['google_captcha_key'],
            $text__
		),
		file_get_contents('../../templates/login.tpl')) .
        str_replace(array(
			'{%forum%}',
            '{%group%}',
            '{%nameproject%}',
			'{%ip%}',
			'{%port%}',
            '{%youtube%}'
		),
		array(
			$config['forum'],
            $config['vk'],
            $config['_name_project_'],
            $config['_ip_'],
			$config['_port_'],
            $config['youtube']
		),
		file_get_contents('../../templates/footer.tpl'));
    }
	/* Выходим, показав сам шаблон */
	exit($template);
?>