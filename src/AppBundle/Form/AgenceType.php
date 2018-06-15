<?php

namespace AppBundle\Form;

use AppBundle\Entity\Translation\AgenceTranslation;
use AppBundle\Form\Translation\AgenceTranslationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("nom")
            ->add('telephone')
            ->add('siret')
            ->add('email', EmailType::class)
            ->add('photo', FileType::class, ['data_class' => null])
            ->add("adresse", TextType::class)
            ->add('departementid', null, [
                'label' => 'Zones chalandise',
            ])
            ->add("translations", CollectionType::class, [
                "entry_type"=>AgenceTranslationType::class,
                "allow_add"=>true,
                "allow_delete"=>true
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Agence',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_agence';
    }
}
