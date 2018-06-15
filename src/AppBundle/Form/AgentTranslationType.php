<?php

namespace AppBundle\Form;

use AppBundle\Entity\Locale;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgentTranslationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('locale', EntityType::class, ['class'=>Locale::class, 'choice_label'=>'libelle'])
            ->add('passionTitre')
            ->add('passionContenu')
            ->add('destinationTitre')
            ->add('destinationContenu')
            ->add('formationTitre')
            ->add('formationContenu')
            ->add('cursus')
            ->add('cursusSolidaire')
            ->add('signatureHoraireTravail')
            ->add('phrase');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Translation\AgentTranslation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_agenttranslation';
    }
}
