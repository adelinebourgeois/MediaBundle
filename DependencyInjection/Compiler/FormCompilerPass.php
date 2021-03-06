<?php
/**
 * @author jgn
 * @date 14/10/2016
 * @description For ...
 */

namespace Donjohn\MediaBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FormCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $resources = $container->getParameter('twig.form.resources');

        $resources[] = 'DonjohnMediaBundle:Form:media_widget.html.twig';

        $container->setParameter('twig.form.resources', $resources);
    }

}
