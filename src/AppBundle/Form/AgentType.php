<?php

namespace AppBundle\Form;

use AppBundle\Entity\Agence;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prenom')
            ->add('nom')
            ->add('email', EmailType::class)
            ->add('initiales')
            ->add('telDirecte', TextType::class, ['label' => 'Telephone'])
            ->add('horaire')
            ->add('photo', FileType::class, ['data_class' => null])
            ->add('visibleInternet', CheckboxType::class, ['label' => 'Visible sur internet?', 'required' => false])
            ->add('objectif')
            ->add('agenceid', EntityType::class, ['class' => Agence::class, 'choice_label' => 'nom', 'label' => 'Agence']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Agent',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_agent';
    }
}
