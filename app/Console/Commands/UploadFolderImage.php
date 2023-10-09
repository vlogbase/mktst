<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UploadFolderImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:upload-folder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $folders = glob(public_path('upload/pdftojpeg/*'));
        foreach($folders as $folder){
            $parts = explode('/', $folder);
            $lastPart = end($parts);
            $files = glob(public_path('upload/pdftojpeg/' . $lastPart . '/*'));
            if (!empty($files)) {
                $fileInfo = pathinfo($files[0]);
                $fileExtension = $fileInfo['extension'];
                $partialFileName = $lastPart;
                $destinationPath = public_path('upload/newjpgimages/' . $partialFileName . '.jpg');
                if(!file_exists($destinationPath)){
                    copy($files[0], $destinationPath);
                    echo $fileInfo['filename'] . "copied \n";
                }
            }
        }
        $this->info('Done');
    }
}
