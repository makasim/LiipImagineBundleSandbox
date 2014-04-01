<?php

namespace Acme\DemoBundle\Controller;

use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Extra;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LiipController extends Controller
{
    /**
     * @Extra\Route("/liip", name="demo_liip")
     * @Extra\Template()
     */
    public function indexAction()
    {
        $this->getCacheManager()->remove(null, array(
            'thumbnail_default',
            'thumbnail_web_path',
            'thumbnail_amazon_s3',
            'thumbnail_aws_s3',
            'thumbnail_no_cache',
        ));

        return array(
            'runtimeConfig' => array(
                'thumbnail' => array(
                    'size' => array(50, 50)
                )
            )
        );
    }

    /**
     * @return CacheManager
     */
    protected function getCacheManager()
    {
        return $this->get('liip_imagine.cache.manager');
    }

}
