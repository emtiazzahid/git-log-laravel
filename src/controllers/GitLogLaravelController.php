<?php

namespace EmtiazZahid\GitLogLaravel;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class GitLogLaravelController
 * @package EmtiazZahid\GitLogLaravel
 */
class GitLogLaravelController extends Controller
{
    public $gitLogParser;
    /**
     * @var string
     */
    protected $view_log = 'git-log-laravel::log';

    public function __construct(GitLogParser $gitLogParser)
    {
        $this->gitLogParser = $gitLogParser;
    }

    /**
     * @param Request $request
     * @return array|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(Request $request)
    {
        if ($request->input('hash')) {
            return $this->gitLogParser->parseLogFiles($this->processRun([
                'git',
                'show',
                '--stat',
                $request->input('hash')
            ]));
        }

        $data = [
            'records' => $this->gitLogParser->parseLog($this->processRun(['git', 'log']))
        ];

        return app('view')->make($this->view_log, $data);
    }

    public function processRun($commands)
    {
        $process = new \Symfony\Component\Process\Process($commands);
        $process->setWorkingDirectory(base_path());
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \Symfony\Component\Process\Exception\ProcessFailedException($process);
        }

        return $process->getOutput();
    }
}
