<?php
/**
 * @author jgn
 * @date 12/09/2016
 * @description For ...
 */

namespace Donjohn\MediaBundle\Form\Type;


use Donjohn\MediaBundle\Model\Media;
use Donjohn\MediaBundle\Form\Transformer\MediaDataTransformer;
use Donjohn\MediaBundle\Provider\Factory\ProviderFactory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaCollectionType extends AbstractType
{
    /**
     * @var ProviderFactory
     */
    protected $providerFactory;

    /**
     * @var string
     */
    protected $classMedia;

    public function __construct( ProviderFactory $providerFactory, $classMedia)
    {
        $this->providerFactory = $providerFactory;
        $this->classMedia = $classMedia;
    }

    public function getParent()
    {
        return CollectionType::class;
    }


    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults(array(
                'translation_domain' => 'DonjohnMediaBundle',
                'error_bubbling' => true,
                'label' => 'medias',
                'allow_delete' => true,
                'allow_add' => true,
                'entry_type' => MediaType::class,
                'dropzone' => false,
                'entry_options' => array('provider' => 'file',
                                        'dropzone' => false,
                                        'label' => false,
                                        'attr' => array('class' => 'hidden'),
                                        'required' => false,
                                    ),
                ));
    }

    public function buildView(
        FormView $view,
        FormInterface $form,
        array $options
    ) {
        $view->vars['dropzone'] = $options['dropzone'];
        $view->vars['provider'] = $options['entry_options']['provider'];

    }

}