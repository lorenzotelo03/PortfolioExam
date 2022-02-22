<?php
	session_start();
    $code = "";


      if($_SERVER["REQUEST_METHOD"]=="GET"){
          if(isset($_GET['code'],$_GET['state'])){
            $code = $_GET['code'];
            $state = $_GET['state'];
           
          }else{
            header("Location: https://id.paleo.bg.it/oauth/authorize?client_id=1dff1a78ea86d14f89c7373e750e88ff&response_type=code&state=123456789&redirect_uri=https://darkness.altervista.org/ArchExam/index.php");
          }
      }
      if($_SERVER["REQUEST_METHOD"]=="POST"){
          $token = $_GET['acces_token'];
      }
      if($state =="123456789"){

        $post = new stdClass;
        $post->grant_type = "authorization_code";
        $post->code = $code;
        $post->redirect_uri = "https://darkness.altervista.org/index.php";
        $post->client_id = "1dff1a78ea86d14f89c7373e750e88ff";
        $post->client_secret = "38fbc36fdb88eacdfdf763146e5ee76c792283706855a84885c45a266db9a19a8a9142dc69870d90c7f333cd0083d32f64c622a8d43f0a2185c3f5e8eee232cd";
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://id.paleo.bg.it/oauth/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($post),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ],
        ]);
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);

        if ($err) {
        echo "cURL Error #:".$err;
        } else {
        $obj = json_decode($response);
        $token = $obj->{'access_token'}; 
        var_dump($obj);
        }
        
?>  