<?php
require __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class PlantNet {

    private $api_key = "";
    private $domain = "";

    function __construct(){
        try {
            $_settings = Yaml::parse(file_get_contents(__DIR__ . '/../../config/install/camellia_module.settings.yml'));
            
            $this->api_key = $_settings['camellia_module']['api_key'];
            $this->domain = $_settings['camellia_module']['domain'];
        } catch (ParseException $exp){
            throw new Exception($exp->getMessage());
        }
    }

    function get_api_response(string $img_id, string $organ) {
        $img_url = "https://" . $this->domain . "/modules/custom/camellia_module/uploads/" . $img_id;    
        $service = "https://my-api.plantnet.org/v2/identify/all";
        $url = $service . "?" . http_build_query(array(
            "api-key" => $this->api_key,
            "images" => $img_url,
            "organs" => $organ
        ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

}
?>