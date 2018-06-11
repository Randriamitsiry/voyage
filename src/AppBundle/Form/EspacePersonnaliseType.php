<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EspacePersonnaliseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('passionTitre')
            ->add('passionContenu', TextareaType::class)
            ->add('destinationTitre')
            ->add('destinationContenu', TextareaType::class)
            ->add('formationTitre')
            ->add('formationContenu', TextareaType::class)
            ->add('cursusFr', TextareaType::class, ['label'=>"Cursus en version française"])
            ->add('cursusEn', TextareaType::class, ['label'=>"Cursus en version anglaise"])
            ->add('cursusSolidaire', TextareaType::class, ['label'=>"Cursus solidaire"])
            ->add('signatureTel')
            ->add('signatureHoraireTravail')
            ->add('signatureVisuel')
            ->add('phrase',null, ['label'=>"Phrase d'accroche"]);
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
