<?php

namespace AppBundle\Entity;

/**
 * This is task model class.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Task
{
    /**
     * @var string
     */
    protected $task;
    /**
     * @var \DateTime
     */
    protected $dueDate;

    /**
     * @return string
     */
    public function getTask() : string
    {
        return $this->task;
    }

    /**
     * @param string $task
     */
    public function setTask(string $task)
    {
        $this->task = $task;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate() : \DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTime|null $dueDate
     */
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
}
