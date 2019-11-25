<?php

namespace UsersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->setAction($options['action'])
                 ->add('username')
                ->add('password')
                ->add('email')
                ->add('nom')
                ->add('prenom')
                ->add('telephone')
                ->add('roles',ChoiceType::class,array(
                   'choices'=>array(
                       'Expert'=>'ROLE_EXPERT',
                       'Jardinier'=>'ROLE_JARDINIER',
                       'Paysagist'=>'ROLE_PAYSAGISTE',
                       'Admin'=>'ROLE_ADMIN'
                   )
                ))
            ->add('image',FileType::class,array('label'=>'Selectionner photo'))
            ->add('Ajouter',SubmitType::class)
                ;
               // ->add('usernameCanonical')

               // ->add('emailCanonical')
               // ->add('enabled')
               // ->add('salt')

              //  ->add('lastLogin')
              //  ->add('confirmationToken')
              //  ->add('passwordRequestedAt')





    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UsersBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'usersbundle_user';
    }


}