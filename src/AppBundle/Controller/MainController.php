<?php

namespace AppBundle\Controller;

use AppBundle\Form\MainForm;
use AppBundle\Model\Api\ExchangeRatesSeries;
use AppBundle\Model\Main;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{

    public function indexAction(Request $request)
    {
        $form = $this->createForm(MainForm::class);

        return $this->render('@App/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function convertAction(Request $request)
    {
        $main = new Main();

        $form = $this->createForm(MainForm::class, $main);
        $form->handleRequest($request);

        $status = false;
        $error = false;

        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                try {
                    //getting rates data from external api
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, 'http://api.nbp.pl/api/exchangerates/rates/a/rub/');
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type:application/json',
                        'Accept: application/json'
                    ));
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLINFO_HEADER_OUT, true);

                    $output = curl_exec($curl);

                } catch (\Exception $e) {

                    return new JsonResponse([
                        'status' => false,
                        'zlotyValue' => '',
                        'rubValue' => '',
                        'error' => $e->getMessage()
                    ]);
                }

                $serializer = $this->get('jms_serializer');
                $data = $serializer->deserialize($output, ExchangeRatesSeries::class, 'json'); // deserializing received data

                $mid = $data->getRates()[0]->getMid(); // getting currency mid rate

                $zlotyValue = floor($main->getRubValue() * $mid * 100) / 100; // getting 2 decimal places and rounding down
                $main->setZlotyValue($zlotyValue); // setting value of zloty

                $status = true;

            } else {

                $status = false;
                $error = $form['rubValue']->getErrors()->getChildren()->getMessage(); //setting validation error message
            }
        }

        return new JsonResponse([
            'status' => $status,
            'zlotyValue' => $main->getZlotyValue(),
            'rubValue' => $main->getRubValue(),
            'error' => $error
        ]);
    }
}
