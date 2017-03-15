<?php

namespace EkomiIntegration\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
use EkomiIntegration\Services\EkomiServices;
use EkomiIntegration\Helper\ConfigHelper;

/**
 * Class ContentController
 * @package EkomiIntegration\Controllers
 */
class ContentController extends Controller {

    /**
     * @param Twig $twig
     * @return string
     */
    //https://developers.plentymarkets.com/rest-doc/order/details#list-orders-by-filter-options
    public function sayHello(Twig $twig, EkomiServices $service, ConfigHelper $helper): string {

        $status = $helper->getOrderStatus();
        $status = explode(',', $status);
        
        if (is_array($status)) {
            foreach ($status as $key => $value) {
                echo "{$key}:{$value}";
                echo '<br/>';
            }
        }
        //  $service->sendOrdersData(7);

        return $twig->render('EkomiIntegration::content.hello');
    }

}
