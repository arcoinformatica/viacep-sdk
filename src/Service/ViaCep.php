<?php

namespace Sdk\ViaCep\Service;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use Exception;
use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;
use Sdk\ViaCep\Model\CepData;
use Sdk\ViaCep\Serializer\CustomSerializer;

class ViaCep
{

    /**
     *
     * @var GuzzleClient 
     */
    private $client;

    /**
     *
     * @var CustomSerializer
     */
    private $serializer;

    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
        $this->serializer = new CustomSerializer();

        $config = [
            'base_uri' => 'https://viacep.com.br'
        ];
        $this->client = new GuzzleClient($config);
    }

    /**
     *
     * @param string $cep
     * @return CepData
     */
    public function get(string $cep): CepData
    {
        try {
            if (strlen($cep) != 8) {
                throw new Exception("Cep inválido. Cep deve possuir 8 caracteres.");
            }

            $request = new Request(
                'GET',
                "/ws/{$cep}/json"
            );

            $this->infoLog($request);

            $response = $this->client->send($request);

            return $this->serializer->deserialize(
                $response->getBody()->getContents(),
                CepData::class
            );
        } catch (RequestException $ex) {
            $this->errorLog($ex);
            throw $ex;
        }
    }

    private function infoLog(Request $request)
    {
        if ($this->logger !== null) {
            $this->logger->debug(
                trim(
                    sprintf(
                        "Request Click Entregas\n%s %s\n%s\n\n%s",
                        'POST',
                        $request->getUri(),
                        implode("\n", $request->getHeaders()),
                        $request->getBody()->getContents()
                    )
                )
            );
        }
    }

    private function errorLog(RequestException $ex): void
    {
        if ($this->logger !== null) {
            if ($ex->hasResponse()) {
                $this->logger->error(
                    trim(
                        sprintf(
                            "Response Error ViaCep\n%s\n%s\n\n%s",
                            $ex->getRequest()->getUri(),
                            implode("\n", $ex->getResponse()->getHeaders()),
                            $ex->getResponse()->getBody()->getContents()
                        )
                    )
                );
            } else {
                $this->logger->error(
                    trim(
                        sprintf(
                            "Response Error ViaCep\n%s\n%s\n\n%s",
                            $ex->getRequest()->getUri(),
                            $ex->getCode(),
                            $ex->getMessage()
                        )
                    )
                );
            }
        }
    }
}
