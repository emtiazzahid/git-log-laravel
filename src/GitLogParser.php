<?php

namespace EmtiazZahid\GitLogLaravel;

class GitLogParser
{
    public function parseLog($log) {
        $lines = explode("\n", $log);
        $history = array();
        foreach($lines as $key => $line) {
            if(strpos($line, 'commit') === 0 || $key + 1 == count($lines)){
                if(!empty($commit)){
                    $commit['message'] = substr($commit['message'], 4);
                    array_push($history, $commit);
                    unset($commit);
                }
                $commit['hash'] = substr($line, strlen('commit') + 1);
            } else if(strpos($line, 'Author') === 0){
                $commit['author'] = substr($line, strlen('Author:') + 1);
            } else if(strpos($line, 'Date') === 0){
                $commit['date'] = substr($line, strlen('Date:') + 3);
            } elseif (strpos($line, 'Merge') === 0) {
                $commit['merge'] = substr($line, strlen('Merge:') + 1);
                $commit['merge'] = explode(' ', $commit['merge']);
            } else {
                if(isset($commit['message'])) {
                    $commit['message'] .= $line;
                } else {
                    $commit['message'] = $line;
                }
            }
        }
        return $history;
    }

    public function parseLogFiles($files) {
        $lines = explode("\n", $files);
        $history = array();
        foreach($lines as $key => $line) {
            $history[] = '<code><small>'.$line.'</small></code>';
        }
        return $history;
    }
}