<?php

require_once __DIR__.'/WebpackDevServerBaseDriver.php';

class VueCliValetDriver extends WebpackDevServerBaseDriver
{
    protected function getRunner()
    {
        return 'npm run serve -- --port %s';
    }

    protected function getStaticFolder()
    {
        return 'public';
    }

    protected function getDevDependency()
    {
        return '@vue/cli-service';
    }

    protected function filterDevContent($content)
    {
        return str_replace('js/app.js', "//{$this->devServerHost}:{$this->port}/js/app.js", $content);
    }
}
