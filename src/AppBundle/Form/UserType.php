<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomUtilisateur')
            ->add('plainPassword', RepeatedType::class, [
                'type'=>PasswordType::class,
                'invalid_message'=>'Les deux mots de passe de correspondent pas',
                'options'=> ['attr'=> ['class'=>'password-field']],
                'required'=>true,
                'first_options'=> ['label'=>'Mot de passe'],
                'second_options'=>['label'=>'Confirmation mot de passe']
            ])
            ->add('email', EmailType::class)
            ->add('roleid')
            ->add("agent");
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }
}
