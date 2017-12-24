<?php

namespace AppBundle\Form;

use AppBundle\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Task form.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class TaskType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task', TextareaType::class, [
                'required' => false,
                'label' => 'Task description',
            ])
            ->add('dueDate', null, ['required' => false])
            ->add('done', null, ['required' => false])
            ->add('save', SubmitType::class, ['label' => 'Create task']);
    }

    /**
     * {@in}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
