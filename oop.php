<?php

class File
{
    public $file;

    public function files()
    {
        return [
            '/var/www/site/public/docs/test.txt',
            '/var/www/site/public/docs/test.doc',
            '/var/www/site/public/docs/test.xml'
        ];
    }

    public function getRandomFile()
    {
        $files = $this->files();
        return $files[mt_rand(0, 2)];
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getExtension()
    {
        $pathInfo = pathinfo($this->file);
        return $pathInfo['extension'];
    }

    public function action($doc)
    {
        switch ($doc) {
            case 'txt':
                return $this->actionTxt();
            case 'doc':
                return$this->actionDoc();
            case 'xml':
                return $this->actionXml();
        }
    }

    public function actionTxt()
    {
        return 'txt';
    }

    public function actionDoc()
    {
        return 'doc';
    }

    public function actionXml()
    {
        return 'xml';
    }
}

$file = new File();
$file->setFile($file->getRandomFile());
$file->action($file->getExtension());
