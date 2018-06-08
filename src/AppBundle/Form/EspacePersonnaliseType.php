<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EspacePersonnaliseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('passionTitre')->add('passionContenu')->add('destinationTitre')->add('destinationContenu')->add('formationTitre')->add('formationContenu')->add('cursusFr')->add('cursusSolidaire')->add('cursusEn')->add('signatureTel')->add('signatureHoraireTravail')->add('signatureVisuel')->add('phrase')->add('agentid');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EspacePersonnalise'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_espacepersonnalise';
    }


}
