<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is task model class.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Task
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    private $task;

    /**
     * @var \DateTime
     *
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    private $dueDate;

    /**
     * @var bool
     *
     * @Assert\Type("boolean")
     */
    private $done;

    /**
     * @return string
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param string $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate()
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

    /**
     * Using "isser" instead of "getter".
     * Also you can use "hasser".
     *
     * @return bool
     */
    public function isDone()
    {
        return $this->done;
    }

    /**
     * @param bool $done
     */
    public function setDone($done = false)
    {
        $this->done = $done;
    }
}
