<?php

namespace App\Command\Project;

use App\Consumer\Queue;
use Symfony\Component\Console;
use App\Infrastructure\ValueObject\Consumer\Message;
use App\Domain\Consumer\DependencyInjection\ProjectDependencyInterface;

class ParseCommand extends Console\Command\Command
{
    /**
     * @var ProjectDependencyInterface
     */
    protected $dependency;

    /**
     * @param ProjectDependencyInterface $dependency
     */
    public function __construct(ProjectDependencyInterface $dependency)
    {
        parent::__construct();

        $this->dependency = $dependency;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('app:project:parse');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output)
    {
        $queue = $this->dependency->getQueue()->create(Queue\Project\Channel\ParseConsumer::QUEUE_NAME);

        foreach ($this->dependency->getProjectRepository()->findAll() as $project) {
            $queue->produce(new Message(json_encode([
                'project' => $project->getId(),
            ])));
        }
    }
}
