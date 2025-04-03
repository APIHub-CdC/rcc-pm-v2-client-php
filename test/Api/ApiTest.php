<?php

namespace RCCPMV2\MX\Client;

use PHPUnit\Framework\TestCase;

use \GuzzleHttp\Client;
use \GuzzleHttp\HandlerStack as handlerStack;

use Signer\Manager\ApiException;
use Signer\Manager\Interceptor\MiddlewareEvents;
use Signer\Manager\Interceptor\KeyHandler;

use \RCCPMV2\MX\Client\Configuration;
use \RCCPMV2\MX\Client\Model\Error;
use \RCCPMV2\MX\Client\Api\RCCPMV2Api as Instance;

use \RCCPMV2\MX\Client\Model\Persona;
use \RCCPMV2\MX\Client\Model\PersonaDomicilio;
use \RCCPMV2\MX\Client\Model\PersonaPeticion;
use \RCCPMV2\MX\Client\Model\CatalogoEstados;
use \RCCPMV2\MX\Client\Model\CatalogoPais;

class ApiTest extends TestCase {

    private $username;
    private $password;
    private $apiKey;
    private $httpClient;
    private $config;

    protected function setUp(): void {

        $this->username = "your_circulodecredito_username";
	    $this->password = "your_circulodecredito_password";
        $this->apiKey = "your_circulodecredito_apikey";
	    $apiUrl = "https://services.circulodecredito.com.mx/reporte-pm/v2/rcc-pm";

        $keystorePassword    = "your_keystore_password";
        $keystore            = "your-keystore.p12";
        $cdcCertificate      = "your.cdc_cert.pem";

        $signer = new KeyHandler($keystore, $cdcCertificate, $keystorePassword);

        $events = new MiddlewareEvents($signer);
        $handler = handlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));   
        $handler->push($events->verify_signature_header('x-signature'));
        $client = new Client(['handler' => $handler]);

        $config = new Configuration();
        $config->setHost($apiUrl);

        $this->apiInstance = new Instance($client, $config);

    }     
    
    public function testGetReporteCreditoPMV2()
    {

        $request = new PersonaPeticion();
        $persona = new Persona();
        $domicilio = new PersonaDomicilio(); 
        $catalogoEstados = new CatalogoEstados(); 
        $catalogoPais = new CatalogoPais();            

        $domicilio->setDireccion("CALLE DEL CENTENO 14 0");
        $domicilio->setColoniaPoblacion("LAS PALMAS");
        $domicilio->setDelegacionMunicipio("CUAJIMALPA DE MORELOS");
        $domicilio->setCiudad("CUAJIMALPA DE MORELOS");
        $domicilio->setEstado($catalogoEstados::DF);
        $domicilio->setCP("05210");
        $domicilio->setPais($catalogoPais::MX);

        $persona->setRFC("ETS980201AN1");
        $persona->setNombre("EMPRESA TESTER SA DE CV");
        $persona->setDomicilio($domicilio);

        $request->setFolioOtorgante("1000001");
        $request->setPersona($persona);
        
        try {

            $result = $this->apiInstance->getReporteCreditoPM($this->apiKey, $this->username, $this->password, $request);
            if($this->apiInstance->getStatusCode() == 200){
                print_r($result);
            }            
        } catch (ApiException $e) {
            if($e->getCode() !== 204){
                echo 'Exception when calling ApiTest->testGetReporteCreditoPMV2: ', $e->getMessage(), PHP_EOL;
            }
        }
        $this->assertTrue($this->apiInstance->getStatusCode() == 200);         
    }   
}
