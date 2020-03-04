               ___                           __                           
   _________ _/ (_)___ ___  ________  ____ _/ /       _________  ____ ___ 
  / ___/ __ `/ / / __ `__ \/ ___/ _ \/ __ `/ /       / ___/ __ \/ __ `__ \
 (__  ) /_/ / / / / / / / (__  )  __/ /_/ / /  _    / /__/ /_/ / / / / / /
/____/\__,_/_/_/_/ /_/ /_/____/\___/\__,_/_/  (_)   \___/\____/_/ /_/ /_/ 
                                                                          
<?php
echo "Username kau: ";
$username = trim(fgets(STDIN));
echo "Jumlah MAX 100 :";
$jum = trim(fgets(STDIN));
if($jum < 101){
    for ($i = 0; $i < $jum; $i++){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://167.86.120.199/~salimsea/?param=igstory&keyword=$username",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $decode = json_decode($response, true);
        $hasil = $decode['msg'];
        if(!$hasil){
            print_r("\033[31m [-] Terjadi kesalahan \n\033[39m");
        }else {
            print_r("\e[32m [+] ".$hasil."\n\033[39m");
        }
    }
} else {
    print_r("\033[31m [-] gabisa baca lo \n\033[39m");
}
